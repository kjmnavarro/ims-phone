<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Domain;
use App\Models\Feature;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($phoneNumber)
    {
        $subs = Subscriber::where('phone_number', $phoneNumber)->get();

        foreach ($subs as $sub) {
            
            $domain = Domain::find($sub->domain_id);
            $feature = Feature::find($sub->features_id);
            $status = Status::find($sub->status_id);

            $allData = [
                'domain' => $domain->domain,
                'feature' => $feature->feature,
                'provisioned' => $feature->provisioned,
                'destination' => $feature->destination,
                'status' => $status->name,
                'phone_number' => $sub->phone_number,
                'username' => $sub->username,
                'password' => $sub->password,
            ];
        }
        return view('view', compact('allData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate(
            [
                'phone_number' => ['required', 'string', 'min:11'],
                'username' => ['required', 'string', 'min:11'],
                'password' => ['required', 'string', 'min:8'],
                'domain_id' => ['required'],
                'status_id' => ['required'],
                'features_id' => ['required'],
            ]
        );

        if ($validated) 
        {
            Subscriber::create($validated);
            return redirect()->route('home')->with('success', 'Subscriber created successfully');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $domains = Domain::all();
        $features = Feature::all();
        $statuses = Status::all();
        
        $subs = Subscriber::find($id);

        return view('edit', compact('domains', 'features', 'statuses', 'subs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $validated = request()->validate(
            [
                'phone_number' => ['required', 'string', 'min:11'],
                'username' => ['required', 'string', 'min:11'],
                'password' => ['required', 'string', 'min:8'],
                'domain_id' => ['required'],
                'status_id' => ['required'],
                'features_id' => ['required'],
            ]
        );

        if ($validated) 
        {
            $updateSubs = Subscriber::find($request->id);
            $updateSubs->update($validated);

            return redirect()->route('home')->with('success', 'Subscriber updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteSub = Subscriber::find($id);
        $deleteSub->delete();
        return redirect()->route('home')->with('success', 'Subscriber deleted successfully');
    }
}
