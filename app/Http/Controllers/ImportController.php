<?php

namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    protected $error;
    protected $sheet;
    protected $category;
    protected $importMoney;
    protected $transaction;
    protected $mainCategory;
    protected $initialCategories;

    public function __construct(Category $category, MainCategory $mainCategory, Transaction $transaction)
    {
        $this->error = false;
        $this->category = $category;
        $this->transaction = $transaction;
        $this->mainCategory = $mainCategory;
        $this->initialCategories = collect(config('initialcategories'));
    }

    public function index()
    {
        return view('import.index');
    }

    public function importAll(Request $request)
    {

        $this->uploadFile($request);
        $this->importMainCategories();
        $this->importCategories();
        $this->importTransactions();
        $this->modifyCatsAndMainCats();

        if ($this->error) {
            return Redirect::to('import')->withErrors(['error' => $this->error]);
        } else {
            $request->session()->flash('success', 'Uspesno importovan excel file!');
            return Redirect::to('import');
        }

    }

    public function uploadFile($request)
    {
        $this->validate($request, ['file' => 'required']);

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $file->move('inportedExcel', 'importfile.xlsx');
        }

        $excel = Excel::load(public_path('inportedExcel\importfile.xlsx'));

        $this->sheet = $excel->all();
    }

    public function importMainCategories()
    {
        if ($this->mainCategory->first()) {
            $this->error = "Vec su upisane osnovne kategorije";
            return;
        }
        $this->initialCategories->transform(function ($item, $key) {
            $mainCategory = $this->mainCategory->create(['name' => $item['main_name']]);
            $item['main_id'] = $mainCategory->id;
            return $item;

        });

    }

    public function importCategories()
    {
        if ($this->category->first()) {
            $this->error = "Vec su upisane kategorije";
            return;
        }
        $this->initialCategories->transform(function ($item, $key) {
            foreach ($item['categories'] as $category) {
                $this->category->create([
                    'name' => $category,
                    'main_category_id' => $item['main_id'],
                    'type' => $item['type']
                ]);
            }
            return $item;

        });

    }

    public function importTransactions()
    {

        if ($this->transaction->first()) {
            $this->error = "Vec su upisane transakcije";
            return;
        }
        $transactions = [];

        foreach ($this->sheet as $row) {
            try {

                $category = $this->category->getByName($row['tip']);
                $transaction['category_id'] = $category->id;
                $transaction['description'] = $row['opis'];
                $transaction['price'] = $this->castNumbers($row);
                $transaction['date'] = $row['datum'];
                $transaction['created_at'] = new \DateTime();
                $transaction['updated_at'] = new \DateTime();

                $transactions[] = $transaction;
            } catch (\Exception $exception) {
                $this->error = "Greska prlikom upisa transakcije.";
                return;
            }
        }

        $this->transaction->insert($transactions);
    }

    protected function modifyCatsAndMainCats()
    {
        $mainCategories = $this->mainCategory->all();

        foreach ($mainCategories as $mainCategory) {
            $mainCategory->name = Helper::firstToUp($mainCategory->name);
            $mainCategory->save();
        }

        $categories = $this->category->all();

        foreach ($categories as $category) {
            $category->name = Helper::firstToUp($category->name);
            $category->save();
        }
    }

    protected function castNumbers($row)
    {
        $number = round(!is_null($row['duguje']) ? $row['duguje'] : $row['potrazuje'], 2);
        return $number;
    }
}