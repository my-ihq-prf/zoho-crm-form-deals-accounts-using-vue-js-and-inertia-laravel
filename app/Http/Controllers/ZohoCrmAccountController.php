<?php

namespace App\Http\Controllers;

use Asciisd\Zoho\Facades\ZohoManager;
use Illuminate\Http\Request;

class ZohoCrmAccountController extends Controller
{
    //

    public function addNewAccount(Request $request)
    {
        $validatedData = $request->validate([
            'Account_Name' => ['required', 'max:50'],
            'Website' => ['required', 'regex:/\b(?:(?:https?):\/\/|www\.)?[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'Phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        ]); // array(3)
        $accounts = ZohoManager::useModule('Accounts');
        // initiating a new empty instance of leads
        $record = $accounts->getRecordInstance();
        // fill this instance with data
        $record->setFieldValue('Account_Name', $validatedData['Account_Name']);
        $record->setFieldValue('Website', $validatedData['Website']);
        $record->setFieldValue('Phone', $validatedData['Phone']);

        return response()->json((object) $record->create()->getData());
    }

    public function allAccounts(Request $request)
    {
        return ZohoManager::useModule('Accounts')->getJsonRecords();
    }

    public function updateAccount(Request $request)
    {
        $validatedData = $request->validate([

            'id' => ['required', 'min:10', 'max:50'],
            'Account_Name' => ['required', 'max:50'],
            'Website' => ['required', 'regex:/\b(?:(?:https?):\/\/|www\.)?[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'Phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        ]);

        $accounts = ZohoManager::useModule('Accounts');
        $account = $accounts->getRecord($validatedData['id']);
        $account->setFieldValue('Account_Name', $validatedData['Account_Name']);
        $account->setFieldValue('Website', $validatedData['Website']);
        $account->setFieldValue('Phone', $validatedData['Phone']);

        return response()->json((object) $account->update()->getData());
        // return response()->json((object) $account->getData());
    }

    public function deleteAccount(Request $request)
    {
        $validatedData = $request->validate([

            'id' => ['required', 'min:10', 'max:50'],
            'Account_Name' => ['required', 'max:50'],
            'Website' => ['required', 'regex:/\b(?:(?:https?):\/\/|www\.)?[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'Phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        ]);
        $accounts = ZohoManager::useModule('Accounts');
        $account = $accounts->getRecord($validatedData['id']);

        return response()->json((object) $account->delete());
    }
}
