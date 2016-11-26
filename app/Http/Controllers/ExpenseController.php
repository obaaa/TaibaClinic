<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Expense;


class ExpenseController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
//***************************index***************************//

    public function index()
    {
      $expenses = Expense::orderBy('created_at', 'desc')->paginate(8);
      return view('expense.index')->withExpenses($expenses);
    }

//***************************create***************************//

    public function create()
    {
        return view('expense.create');
    }

//***************************store***************************//

    public function store(Request $request)
    {
      $expense_name = $request->input('expense_name');
      $expense_category = $request->input('expense_category');
      $expense_price = $request->input('expense_price');
      $expense_description = $request->input('expense_description');
      $expense_date = $request->input('expense_date');


      $new_expense = new Expense;
      $new_expense->expense_name = $request->expense_name;
      $new_expense->expense_category = $request->expense_category;
      $new_expense->expense_price = $request->expense_price;
      $new_expense->expense_description = $request->expense_description;
      $new_expense->expense_date = $request->expense_date;

      $new_expense->save();

      return redirect('expense');
    }

//***************************show***************************//

    public function show($id)
    {
        //
    }

//***************************edit***************************//

    public function edit($id)
    {
      $expense = Expense::find($id);
      return view('expense.edit')->with('expense', $expense);
    }

//***************************update***************************//

    public function update(Request $request, $id)
    {
      $expense_name = $request->input('expense_name');
      $expense_category = $request->input('expense_category');
      $expense_price = $request->input('expense_price');
      $expense_description = $request->input('expense_description');
      $expense_date = $request->input('expense_date');


      $expense = Expense::find($id);
      $expense->expense_name = $expense_name;
      $expense->expense_category = $expense_category;
      $expense->expense_price = $expense_price;
      $expense->expense_description = $expense_description;
      $expense->expense_date = $expense_date;

      $expense->save();

      return redirect('expense');
    }

//***************************destroy***************************//

    public function destroy($id)
    {
      $expense = Expense::find($id)->delete();
      return redirect('expense');
    }
}
