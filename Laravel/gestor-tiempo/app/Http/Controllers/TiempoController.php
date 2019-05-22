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


        //suma de los segundos 
        /*$cantidadHorasLapsos =0;
        $cantidadMinutosLapsos = array();*/
        $sumaMinutosTotales = 0;
        $cantidadMinutos = 0;
        $cantidadHoras = 0;
        $contadorHoras= 0;
        $cantidadMinutosLapsos = [];
        //sacar las horas y minutos por cada lapso
        foreach ($tiempos as $key => $value) {//SACAR INFORMACION DE tiempos de la BD

            //datos de tiempo comienzo y final
            $comienzo = $value->comienzo;
            $final = $value->final;


            // minutos de la hora de comienzo y final
            $minutosInicial = $comienzo[3] . $comienzo[4];
            $minutosFinal = $final[3] . $final[4];


            //horas de las horas comienzo y final
            $horaComienzo = $comienzo[0] . $comienzo[1];
            $horaFinal = $final[0] . $final[1];

            $minutosInicialaux =$minutosInicial;
            $minutosFinalaux = $minutosFinal;
            
            if($minutosInicial >= $minutosFinal){

                while ($minutosFinalaux < $minutosInicialaux) {
                    $cantidadMinutos++;
                    $minutosInicialaux--;
                }
                $cantidadMinutos = 60 - $cantidadMinutos ;
                $cantidadMinutosLapsos = array($key=>(string)$cantidadMinutos);

            }elseif($minutosInicial <= $minutosFinal){

                while ($minutosInicialaux < $minutosFinalaux) {
                    $cantidadMinutos++;
                    $minutosInicialaux++;
                }
              
                $cantidadHoras = $horaFinal - $horaComienzo;
                $cantidadMinutosLapsos = array($key=>(string)$cantidadMinutos);
            }

            
            
            
           
          // var_dump((string)$cantidadHoras.':'.(string)$cantidadMinutos);
            
            $cantidadMinutos = 0;
            
        }
        var_dump($cantidadMinutosLapsos[0]);
    
       /*
        
        if($sumaMinutosTotales <= 60){
            $cantidadMinutos = (int)$minutosFinal - (int)$minutosInicial;
        }else{
            while($sumaMinutosTotales >= 59){
            
                $contadorHoras++;
                $sumaMinutosTotales = $sumaMinutosTotales - 60;
    
            }
            
            
            $cantidadMinutos = $sumaMinutosTotales;
           
        }
        
       */

     
       /* $ultimoRegistro = $tiempos->last();

        $horaInicial = $ultimoRegistro->comienzo;
        $horaFinal = $ultimoRegistro->final;

        $horasInicial= $horaInicial[0] . $horaInicial[1];
        $minutosInicial = $horaInicial[3] .$horaInicial[4];
       
        

        $cantidadHoras = 0;
        $cantidadMinutos = 0;
      
        if($horaFinal != null){

            $horasFinal= $horaFinal[0] . $horaFinal[1];
            $minutosFinal = $horaFinal[3] .$horaFinal[4];
            

            $cantidadHoras = (int)$horasFinal - (int)$horasInicial;

            $sumaDeMinutos = (int)$minutosInicial + (int)$minutosFinal;//opcional para hacer calculo de minutos sobrepasando los 60min

            $cantidadMinutos = (int)$minutosFinal - (int)$minutosInicial;
            
            
            if($sumaDeMinutos >= 60 && $cantidadHoras!=0){
                
                $cantidadHoras = $cantidadHoras + 1;
               
            }
        
        }else{

           

            
            $horasFinal= date('H');
            $minutosFinal = date('i');
           
            $cantidadHoras = (int)$horasFinal - (int)$horasInicial;

            $sumaDeMinutos = (int)$minutosInicial + (int)$minutosFinal;//opcional para hacer calculo de minutos sobrepasando los 60min

            $cantidadMinutos = (int)$sumaDeMinutos - 60;
            
            
            if($sumaDeMinutos >= 60 && $cantidadHoras!=0){
                
                $cantidadHoras = $cantidadHoras + 1;
               
            }

            var_dump($cantidadMinutos);
        }
       
        */

        
        /*if($horaFinal !=null){
            (double)$tiempoTotal= $horaFinal - $horaInicial;
            var_dump(strval($tiempoTotal));
        }*/

        return view('tiempo.index', compact('tiempos'));
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

        if($request->input('tiempoInicio') < $request->input('tiempoFinal') ){
            

            $tiempo->comienzo = $request->input('tiempoInicio');
            $tiempo->final = $request->input('tiempoFinal');
            $tiempo->estado = 1;
           
            $tiempo->save();

            return redirect('/');

        }elseif($request->input('tiempoFinal') == null){
           
            $tiempo->comienzo = $request->input('tiempoInicio');
            $tiempo->final = $request->input('tiempoFinal');
            $tiempo->estado = 1;
           
            $tiempo->save();
            return redirect('/');
          
        }else{
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
