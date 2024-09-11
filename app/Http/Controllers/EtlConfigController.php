<?php

namespace App\Http\Controllers;

use App\Models\EtlConfig;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class EtlConfigController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $itemsPerPage = $request->input('itemsPerPage', 10);

        $etlConfigs = ETLConfig::paginate($itemsPerPage, ['*'], 'page', $page);

        return inertia('EtlConfig/Index', [
            'etlConfigs' => $etlConfigs,
            'isRecent' => false,
        ]);
    }


    public function recent(Request $request)
    {
        $perPage = $request->query('itemsPerPage', 5);
        $etlConfigs = EtlConfig::orderBy('updated_at', 'desc')->paginate($perPage);

        return Inertia::render('EtlConfig/Index', [
            'etlConfigs' => $etlConfigs,
            'isRecent' => true,
        ]);
    }
    public function create()
    {
        $user = Auth::user(); // Get the authenticated user

        return Inertia::render('EtlConfig/Form', [
            'etlConfig' => new EtlConfig(), // Pass an empty ETLConfig model
            'user' => $user, // Pass the user to the Vue component
        ]);
    }

    // Store a newly created ETL Config
    public function store(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'report_type' => 'required|string|max:255',
            'seller_id' => 'required|integer',
            'channel_id' => 'required|integer',
            'last_run_status' => 'nullable|string|max:255',
            'last_report_id' => 'nullable|string|max:255',
            'last_report_doc' => 'nullable|string|max:255',
            'first_run_hr' => 'nullable|integer',
            'freq_run_min' => 'nullable|integer',
        ]);

        // Create a new ETL Config
        $etlConfig = new EtlConfig();
        $etlConfig->fill($validatedData);
        $etlConfig->seller_id = Auth::id(); // Set the authenticated user ID as the seller
        $etlConfig->changed_by = Auth::id(); // Save the user making the change
        $etlConfig->save();

        return redirect()->route('etl_configs.index')->with('success', 'ETL Config created successfully!');
    }

    public function edit($id)
    {
        $etlConfig = EtlConfig::findOrFail($id); // Fetch the ETL Config by ID

        // Check if $etlConfig exists
        if (!$etlConfig) {
            return redirect()->route('etl_configs.index')->with('error', 'ETL Config not found');
        }

        $user = Auth::user();

        // Pass the existing ETL config and the user to the Vue component
        return Inertia::render('EtlConfig/Form', [
            'etlConfig' => $etlConfig, // This is the ETL config you're editing
            'user' => $user, // Pass the user to the Vue component
        ]);
    }

    // Update an existing ETL Config
    public function update(Request $request, $id)
    {
        // Validation rules
        $validatedData = $request->validate([
            'report_type' => 'required|string|max:255',
            'seller_id' => 'required|integer',
            'channel_id' => 'required|integer',
            'last_run_status' => 'nullable|string|max:255',
            'last_report_id' => 'nullable|string|max:255',
            'last_report_doc' => 'nullable|string|max:255',
            'first_run_hr' => 'nullable|integer',
            'freq_run_min' => 'nullable|integer',
        ]);

        // Find the existing ETL Config and update it
        $etlConfig = EtlConfig::findOrFail($id);
        $etlConfig->fill($validatedData);
        $etlConfig->changed_by = Auth::id(); // Save the user making the change
        $etlConfig->save();

        return redirect()->route('etl_configs.index')->with('success', 'ETL Config updated successfully!');
    }



    public function downloadAll()
    {
        $configs = EtlConfig::all();
        $filename = 'etl_configs_' . now()->format('YmdHis') . '.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($configs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Report Type', 'Channel ID', 'Last Run Status', 'Last Report ID', 'Last Report Doc']);

            foreach ($configs as $config) {
                fputcsv($file, [
                    $config->report_type,
                    $config->channel_id,
                    $config->last_run_status,
                    $config->last_report_id,
                    $config->last_report_doc,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function download($id)
    {
        $config = EtlConfig::findOrFail($id);
        $filename = 'etl_config_' . $id . '_' . now()->format('YmdHis') . '.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($config) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Report Type', 'Channel ID', 'Last Run Status', 'Last Report ID', 'Last Report Doc']);

            fputcsv($file, [
                $config->report_type,
                $config->channel_id,
                $config->last_run_status,
                $config->last_report_id,
                $config->last_report_doc,
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
