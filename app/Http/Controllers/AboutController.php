<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mission = 'To empower individuals to understand and improve their mental health through accessible self-assessment tools and resources.';
        
        $vision = 'A world where mental health is prioritized, understood, and effectively managed by everyone.';
        
        $about = 'Mental Health Status (MHS) is a platform designed to help users monitor and understand their mental well-being. We provide simple assessment tools that can help identify potential mental health concerns and connect users with appropriate resources.';
        
        return view('about.index', compact('mission', 'vision', 'about'));
    }
}
