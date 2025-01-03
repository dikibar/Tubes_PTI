<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{    public function index(Request $request)
    {
        $jobtitle = $request->input('jobtitle');
        $jobType = $request->input('job_type');
        $jobIndustry = $request->input('job_industry');
        $jobLevel = $request->input('job_level');
    
        // Fetch the jobs from the API
        $response = Http::get('https://jobicy.com/api/v2/remote-jobs');
    
        if ($response->successful()) {
            $allJobs = $response->json()['jobs'] ?? [];
            
            // Convert to collection for easier manipulation
            $jobs = collect($allJobs);
    
            // Filter job title
            if ($jobtitle) {
                $jobs = $jobs->filter(function ($job) use ($jobtitle) {
                    return stripos($job['jobTitle'], $jobtitle) !== false;
                });
            }
    
            // Filter job type (handling array values)
            if ($jobType) {
                $jobs = $jobs->filter(function ($job) use ($jobType) {
                    // Normalize to lowercase for case-insensitive comparison
                    return collect($job['jobType'])->contains(function ($type) use ($jobType) {
                        return strtolower($type) == strtolower($jobType);
                    });
                });
            }
    
            // Filter job industry (handling array values)
            if ($jobIndustry) {
                $jobs = $jobs->filter(function ($job) use ($jobIndustry) {
                    // Normalize to lowercase for case-insensitive comparison
                    return collect($job['jobIndustry'])->contains(function ($industry) use ($jobIndustry) {
                        return strtolower($industry) == strtolower($jobIndustry);
                    });
                });
            }

            // Filter job level (handling array values)
            if ($jobLevel) {
                $jobs = $jobs->filter(function ($job) use ($jobLevel) {
                    // Normalize to lowercase for case-insensitive comparison
                    return collect($job['jobLevel'])->contains(function ($level) use ($jobLevel) {
                        return strtolower($level) == strtolower($jobLevel);
                    });
                });
            }
            
            // job count
            $jobCount = $jobs->count();

            $uniqueLogos = $jobs->unique(function ($job) {
                return $job['companyLogo'];  
            });
    
            // Re-index the collection
            $jobs = $jobs->values()->all();
            $uniqueLogos = $uniqueLogos->values()->all(); 
              // This will output the filtered jobs in the browser
            // Return the view with filtered jobs
            return view('index', [
                'jobs' => $jobs,     
                'uniqueLogos' => $uniqueLogos, 
                'jobtitle' => $jobtitle,
                'jobType' => $jobType,
                'jobIndustry' => $jobIndustry,
                'jobLevel' => $jobLevel,
                'jobCount' => $jobCount
            ]);
        }
    
        // Return view with empty jobs if the API call fails
        return view('index', ['jobs' => [], 'jobtitle' => $jobtitle]);
    }
    
    public function show($id)
    {
        // Fetch the jobs from the API
        $response = Http::get('https://jobicy.com/api/v2/remote-jobs');
    
        if ($response->successful()) {
            $allJobs = $response->json()['jobs'] ?? [];
            
            // Cari pekerjaan berdasarkan ID
            $job = collect($allJobs)->firstWhere('id', $id);
    
            if ($job) {
                return view('jobDetail', [
                    'job' => $job
                ]);
            }
        }
    
        // Redirect kembali dengan pesan error jika pekerjaan tidak ditemukan
        return redirect()->route('index')->with('error', 'Pekerjaan tidak ditemukan');
    }
    

    // Fungsi untuk mengecek data dari api
    public function cekdata()
    {
        // Fetch the jobs from the API
        $response = Http::get('https://jobicy.com/api/v2/remote-jobs');
    
        if ($response->successful()) {
            $allJobs = $response->json()['jobs'] ?? [];
    
            // Convert to collection for easier manipulation
            $jobs = collect($allJobs);
    
            // Get unique data (bebas)
            $jobIndustries = $jobs->pluck('jobLevel')->flatten()->unique();
    
            // Dump and die to show data
            dd($jobIndustries);  // This will output the job industries array in the browser
        }
    
        // Return empty if the API call fails
        dd([]);  // Output empty array if API fails
    }
    
}
