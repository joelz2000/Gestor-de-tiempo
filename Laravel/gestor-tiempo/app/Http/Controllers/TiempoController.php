<?php

namespace GestorTiempo\Http\Controllers;

use GestorTiempo\Tiempo;
use Illuminate\Http\Request;

class TiempoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiempos = Tiempo::all();//todos los datos de la tabla tiempo

        $sumaMinutosTotales = 0;
        $sumaHorasTotales=0;
        $cantidadMinutos = 0;
        $cantidadHoras = 0;

        //sacar las horas y minutos por cada lapso
        foreach ($tiempos as $key => $value) {//SACAR INFORMACION DE tiempos de la BD
            
            //datos de tiempo comienzo y final
            $comienzo = $value->comienzo;
            $final = $value->final;
            
            if($final != null){
                $cantidadMinutos = 0;
                $cantidadHoras = 0;
                // minutos de la hora de comienzo y final
                $minutosInicial = $comienzo[3] . $comienzo[4];
                $minutosFinal = $final[3] . $final[4];


                //horas de las horas comienzo y final
                $horaComienzo = $comienzo[0] . $comienzo[1];
                $horaFinal = $final[0] . $final[1];

              
                //mminutos auxiliares
                $minutosInicialaux =$minutosInicial;
                $minutosFinalaux = $minutosFinal;
                
                //horas auxiliares

                $horaInicialAux = $horaComienzo;
                $horaFinalAux = $horaFinal;
                
              

                if($minutosFinal == 0){
                   
                    
                    for ($i=$minutosFinalaux; $i < $minutosInicialaux; $i++) { 
                        $cantidadMinutos++;
                       
                    }

                    if($minutosInicial != 0){
                        $cantidadMinutos = 60 - $cantidadMinutos;
                    }
                    
                    if($horaComienzo > $horaFinal){
                        $lapsoMinuto24 = 24 - $horaComienzo;
                        
                        for ($i=0; $i < $horaFinalAux; $i++) { 
                            $cantidadHoras++;
                            
                        }
                        $cantidadHoras = $cantidadHoras + $lapsoMinuto24;
                    }else{
                        $cantidadHoras = $horaFinal - $horaComienzo;
                    }   
                   
                  
                }
                //calculo de tiempo por lapsos
                if($minutosInicial > $minutosFinal && $minutosFinal!=0){

                  
                    for ($i=$minutosFinalaux; $i < $minutosInicialaux; $i++) { 
                        $cantidadMinutos++;
                        
                    }
                 
                    $cantidadHoras++;
                 
                }
                
                if($minutosInicial <= $minutosFinal  && $minutosFinal!=0){
                 
                    for ($i=$minutosInicialaux; $i < $minutosFinalaux; $i++) { 
                        $cantidadMinutos++;
                        
                    }
                    $cantidadHoras = $horaFinal - $horaComienzo;
                } 
                $sumaMinutosTotales = $sumaMinutosTotales + $cantidadMinutos;
               
                // calculo de horas totales de todos los lapsos
                if($sumaMinutosTotales >=60){
                  
                    $sumaMinutosTotales = $sumaMinutosTotales  - 60;
                    $sumaHorasTotales = $sumaHorasTotales + $cantidadHoras;
                    $sumaHorasTotales++;              
                }
                if($sumaHorasTotales <= 60 && $cantidadHoras >0){
                    $sumaHorasTotales = $sumaHorasTotales + $cantidadHoras;
                }
              
              
                //var_dump('tiempo lapso: '.$cantidadHoras.':'.$cantidadMinutos);
               
              //var_dump((string)$sumaHorasTotales.':'.(string)$sumaMinutosTotales);
            }else{

                $horaComienzo = $comienzo[0] . $comienzo[1];
                $minutosInicial = $comienzo[3] . $comienzo[4];

                $horaFinal= date('H');
                $minutosFinal = date('i');

                
                $minutosInicialaux =$minutosInicial;
                $minutosFinalaux = $minutosFinal;
                
               
                //calculo de tiempo por lapsos
                if($minutosFinal == 0){
                   
                    
                    for ($i=$minutosFinalaux; $i < $minutosInicialaux; $i++) { 
                        $cantidadMinutos++;
                     
                    }
                     $cantidadMinutos = 60 - $cantidadMinutos;
                   
                }
                //calculo de tiempo por lapsos
                if($minutosInicial > $minutosFinal && $minutosFinal!=0){

                  
                    for ($i=$minutosFinalaux; $i < $minutosInicialaux; $i++) { 
                        $cantidadMinutos++;
                        
                    }
                 
                    $cantidadHoras++;
                   
                }
                
                if($minutosInicial <= $minutosFinal  && $minutosFinal!=0){
                 
                    for ($i=$minutosInicialaux; $i < $minutosFinalaux; $i++) { 
                        $cantidadMinutos++;
                        
                    }
                    $cantidadHoras = $horaFinal - $horaComienzo;
                } 
                $sumaMinutosTotales = $sumaMinutosTotales + $cantidadMinutos;
                // calculo de horas totales de todos los lapsos
                if($sumaMinutosTotales >=60){
                  
                    $sumaMinutosTotales = $sumaMinutosTotales  - 60;
                    $sumaHorasTotales = $sumaHorasTotales + $cantidadHoras;
                    $sumaHorasTotales++;              
                }
            
                if($sumaHorasTotales <= 60 && $cantidadHoras >0){
                    $sumaHorasTotales = $sumaHorasTotales + $cantidadHoras;
                }
              
               
               
            }
            
        
            
        }
        
      
    
        
        return view('tiempo.index', compact('tiempos','sumaHorasTotales','sumaMinutosTotales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiempo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        $validateData = $request->validate([
            'tiempoInicio'=> 'required'
        ]);

        $tiempo = new Tiempo();

        if($request->input('tiempoFinal') == null){
           
            $tiempo->comienzo = $request->input('tiempoInicio');
            $tiempo->final = $request->input('tiempoFinal');
            $tiempo->estado = 1;
           
            $tiempo->save();
            return redirect('/');
          
        }else{
            $tiempo->comienzo = $request->input('tiempoInicio');
            $tiempo->final = $request->input('tiempoFinal');
            $tiempo->estado = 1;
           
            $tiempo->save();
            return redirect('/');
        }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
