<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the support resources page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Support resources that could be from a database in a real application
        $resources = [
            [
                'title' => 'Government Mental Health Helplines',
                'description' => 'Official Indian government helplines providing immediate mental health support.',
                'items' => [
                    [
                        'name' => 'Tele-MANAS (Tele Mental Health Assistance and Networking Across States)',
                        'contact' => '14416 or 1-800-891-4416 (24/7)',
                        'description' => 'Available in 20+ Indian languages. Provides immediate mental health support, counseling, and referrals.'
                    ],
                    [
                        'name' => 'KIRAN Mental Health Rehabilitation Helpline',
                        'contact' => '1800-599-0019 (24/7)',
                        'description' => 'Available in 13 languages. Offers early screening, psychological support, and distress management.'
                    ]
                ]
            ],
            [
                'title' => 'National Mental Health Programs',
                'description' => 'Government initiatives for accessible and affordable mental healthcare.',
                'items' => [
                    [
                        'name' => 'District Mental Health Programme (DMHP)',
                        'contact' => 'Available at district hospitals',
                        'description' => 'Integrates mental health services into primary healthcare at the district level.'
                    ],
                    [
                        'name' => 'National Mental Health Programme (NMHP)',
                        'contact' => 'Through state health departments',
                        'description' => 'Provides accessible mental healthcare services across India.'
                    ]
                ]
            ],
            [
                'title' => 'WHO-Supported Initiatives',
                'description' => 'Mental health programs supported by the World Health Organization in India.',
                'items' => [
                    [
                        'name' => 'Mental Health Gap Action Programme (mhGAP)',
                        'contact' => 'Through local healthcare providers',
                        'description' => 'Scaling up services for mental, neurological, and substance use disorders.'
                    ],
                    [
                        'name' => 'WHO Collaborating Centres',
                        'contact' => 'Through major mental health institutions',
                        'description' => 'Specialized centers providing expert mental health care and research.'
                    ]
                ]
            ],
            [
                'title' => 'Legal Support & Rights',
                'description' => 'Legal framework protecting mental health rights in India.',
                'items' => [
                    [
                        'name' => 'Mental Healthcare Act, 2017',
                        'contact' => 'Through Mental Health Review Boards',
                        'description' => 'Protects rights of individuals with mental illness and ensures access to healthcare.'
                    ],
                    [
                        'name' => 'State Mental Health Authorities',
                        'contact' => 'Available in each state',
                        'description' => 'Oversees implementation of mental health services and protection of patient rights.'
                    ]
                ]
            ]
        ];

        return view('support.index', compact('resources'));
    }
}
