<?php

namespace App\Http\Controllers;

use Asciisd\Zoho\Facades\ZohoManager;
use Illuminate\Http\Request;

class ZohoCrmDealController extends Controller
{
    //
    public function allDeals(Request $request)
    {
        return ZohoManager::useModule('Deals')->getJsonRecords();
    }

    public function allDealsByAccId(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required', 'min:10', 'max:50'],
        ]);
        $deals = ZohoManager::useModule('Deals');
        $records = $deals->searchRecordsByCriteria('(Account_Name.id:equals:'.$validatedData['id'].')');
        $first_record = $records[0];

        return response()->json((object) $first_record->getData());
    }

    public function addDeal(Request $request)
    {
        $validatedData = $request->validate([
             'Account_Name' => ['required', 'array'],
            'Deal_Name' => ['required', 'max:100'],
            'Stage' => ['required', 'max:100'],
            'Closing_Date' => ['required', 'max:50'],
            'Amount' => ['required', 'max:50'],
        ]);
        $deals = ZohoManager::useModule('Deals');
        // initiating a new empty instance of leads
        $record = $deals->getRecordInstance();
        // fill this instance with data
        $record->setFieldValue('Account_Name', $validatedData['Account_Name']);
        $record->setFieldValue('Deal_Name', $validatedData['Deal_Name']);
        $record->setFieldValue('Stage', $validatedData['Stage']);
        $record->setFieldValue('Closing_Date', $validatedData['Closing_Date']);
        $record->setFieldValue('Amount', $validatedData['Amount']);
        $record->create();

        return response()->json((object) ['flash'=>['success'=>'Deal registered successfully!']]);
    }

    public function updateDeal(Request $request)
    {
        $validatedData = $request->validate([

            'id' => ['required', 'min:10', 'max:50'],
            'Deal_Name' => ['required', 'max:100'],
            'Stage' => ['required', 'max:100'],
        ]);

        $deals = ZohoManager::useModule('Deals');
        $record = $deals->getRecord($validatedData['id']);
        $record->setFieldValue('Deal_Name', $validatedData['Deal_Name']);
        $record->setFieldValue('Stage', $validatedData['Stage']);

        return response()->json((object) $record->update()->getData());
    }

    public function deleteDeal(Request $request)
    {
        $validatedData = $request->validate([

            'id' => ['required', 'min:10', 'max:50'],
        ]);
        $deals = ZohoManager::useModule('Deals');
        $record = $deals->getRecord($validatedData['id']);

        return response()->json((object) $record->delete());
    }
}
