<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoanController extends Controller
{
    public function index() 
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('loan-book', compact('users', 'books'));
    }

    public function store(Request $request) 
    {
        $request['loan_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        $books = Book::findOrFail($request->book_id)->only('status');

        if ($books['status'] != 'in stock') {
            Session::flash('message', 'Books not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('loans');
        }
        else {
            $count = Loan::where('user_id', $request->user_id)
            ->where('actual_return_date', null)
            ->count();

            if ($count >= 3) {
                Session::flash('message', 'You have reached your book borrowing limit');
                Session::flash('alert-class', 'alert-danger');
                return redirect('loans');
            }
            else {
                try 
                {
                    //process insert to loans table
                    DB::beginTransaction();
                    Loan::create($request->all());
                    //proces update book table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
                    Session::flash('message', 'The Book Loan was Successfull');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('loans');
                } 
                catch (\Throwable $th) 
                {
                    DB::rollback();
                }
            }
        }
    }
    public function loan() 
    {
        $loans = Loan::with(['user', 'book'])->get();
        return view('loan', compact('loans'));   
    }

    public function return()  
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('return-book', compact('users', 'books'));
    }
    
    public function returnBook(Request $request) 
    {
        $return = Loan::where('user_id', $request->user_id)
        ->where('book_id', $request->book_id)
        ->where('actual_return_date', null);
        $returnData = $return->first();
        $countData = $return->count();
        if ($countData == 1) 
        {
            $returnData->actual_return_date = Carbon::now()->toDateString();
            $returnData->save();

            Session::flash('message', 'The Book Returned Was Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('return-book');
        }
        else{
            Session::flash('message', 'The Book Returned Was Failed');
            Session::flash('alert-class', 'alert-danger');
            return redirect('return-book');
        }
    }
}
