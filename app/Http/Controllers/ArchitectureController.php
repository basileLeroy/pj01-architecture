<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchitectureController extends Controller
{
    public function showArchitecture()
    {
        $project = [
            '1978-reel-boom',
            '1979-cubus-diebach',
            '1980-venezia-ponte-academia-1',
            '1980-venezia-ponte-academia-2',
            '1980-villa-di-plinio-ostia',
            '1983-eupen',
            '1987-genval',
            '1990-lovendegem',
            '1992-astene',
            '1992-audergem',
            '1992-eynaten',
            '1995-oudenburg',
            '1997-gand',
            '1998-herne',
            '1999-traces-romaines',
            '2000-nazareth',
            '2001-genval-annex',
            '2001-genval-appartments'
        ];
        return view('architecture', [
            'project' => $project
        ]);
    }
    
    public function showProject()
    {
        
        return 'hello World';
    }
    
    public function showReelBoom()
    {
        return view('architecture');
    }
    
    public function showCubusDiebach()
    {
        return view('architecture');
    }
    
    public function showVeneziaPonteAcademiaOne()
    {
        return view('architecture');
    }
    
    public function showVeneziaPonteAcademiaTwo()
    {
        return view('architecture');
    }
    
    public function showVillaDiPlinio()
    {
        return view('architecture');
    }
    
    public function showEupen()
    {
        return view('architecture');
    }
    
    public function showGenval()
    {
        return view('architecture');
    }
    
    public function showLovendegem()
    {
        return view('architecture');
    }
    
    public function showAstene()
    {
        return view('architecture');
    }
    
    public function showAudergem()
    {
        return view('architecture');
    }
    
    public function showEynaten()
    {
        return view('architecture');
    }
    
    public function showOudenburg()
    {
        return view('architecture');
    }
    
    public function showGand()
    {
        return view('architecture');
    }
    
    public function showHerne()
    {
        return view('architecture');
    }
    
    public function showTracesRomaines()
    {
        return view('architecture');
    }
    
    public function showNazareth()
    {
        return view('architecture');
    }
    
    public function showGenvalAnnex()
    {
        return view('architecture');
    }
    
    public function showGenvalAppartments()
    {
        return view('architecture');
    }
    
}
