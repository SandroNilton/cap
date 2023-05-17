<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Area;
use App\Models\Category;
use App\Models\Requirement;
use App\Models\Typeprocedure;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $area1 = Area::create(['name' => 'EVENTOS COMUNICACIÓN Y DIFUSION']);
      $area2 = Area::create(['name' => 'GREMIALES Y BIENESTAR']);

      $category1 = Category::create(['name' => 'CONSULTA Y ENVÍO DE CERTIFICADOS PENDIENTES VIRTUALES Y/O IMPRESOS']);
      $category2 = Category::create(['name' => 'VALIDAR DOCUMENTACIÓN']);
      $category3 = Category::create(['name' => 'APOYO EN DIFUSIÓN - DEPENDE DEL CASO']);
      $category4 = Category::create(['name' => 'INFORMACIÓN']);
      $category5 = Category::create(['name' => 'INSCRIPCION AL CURSO DEPENDE DEL CASO']);
      $category6 = Category::create(['name' => 'VALIDAR DOCUMENTACIÓN']);
      $category7 = Category::create(['name' => 'APOYO EN DIFUSIÓN - DEPENDE DEL CASO']);
      $category8 = Category::create(['name' => 'PARTICIPACIÓN DEL CAP RL']);
      $category9 = Category::create(['name' => 'TARIFARIO DEL CAP RL EN PUBLICIDAD']);
      $category10 = Category::create(['name' => 'INFORMACIÓN GENERAL']);
      $category11 = Category::create(['name' => 'POR COMPRA DE ALGUN PRODUCTO O INSCRIPCIÓN O PAGO DE ALGUN CURSO O EVENTO GRATUITO']);
      $category12 = Category::create(['name' => 'VARIADA']);
      $category13 = Category::create(['name' => 'SOLICITUD SUSPENSION DE COLEGIATURA TEMPORAL POR VIAJE']);
      $category14 = Category::create(['name' => 'SOLICITUD ACTIVACION DE COLEGIATURA']);
      $category15 = Category::create(['name' => 'SOLICITUD SUSPENSION DE COLEGIATURA POR TEMAS PERSONALES']);
      $category16 = Category::create(['name' => 'SOLICITUD DE TRASLADO DE REGIONAL']);
      $category17 = Category::create(['name' => 'SOLICITUD DE CAMBIO DE REGIONAL']);
      $category18 = Category::create(['name' => 'SOLICITUD DE ESTADO DE HABILIDAD DE UN AGREMIADO']);
      $category19 = Category::create(['name' => 'SOLICITUD DE CONFIRMACION, AUTENTICIDAD Y VERACIDAD DE UN AGREMIADO']);
      $category20 = Category::create(['name' => 'SOLICITUD DE CONSTANCIA DE HABILIDAD PARA TRAMITES EN EL EXTRANJERO']);
      $category21 = Category::create(['name' => 'ACTUALIZACION DE DATOS DEL AGREMIADO']);
      $category22 = Category::create(['name' => 'SOLICITUD DE DEVOLUCION POR TRAMITE DE COLEGIATURA']);
      $category23 = Category::create(['name' => 'DIPLOMAS EN FISICO DE NUEVOS COLEGIADOS']);
      $category24 = Category::create(['name' => 'SOLICITUD DE DEVOLUCION POR SEGURO']);
      $category25 = Category::create(['name' => 'DENUNCIAS O QUEJA AL COMITÉ DE ETICA REGIONAL']);
      $category26 = Category::create(['name' => 'DESCARGOS AL COMITÉ DE ETICA REGIONAL']);
      $category27 = Category::create(['name' => 'APELACION AL COMITÉ NACIONAL DE ETICA']);
      $category28 = Category::create(['name' => 'SOLICITUD DE ASISTENCIA POR DEFUNCION']);
      $category29 = Category::create(['name' => 'SOLICITUD DE COMUNICADO POR DEFUNCION']);
      $category30 = Category::create(['name' => 'SOLICITUD DE APOYO ECONOMICO']);
      $category31 = Category::create(['name' => 'DISPENSA POR MULTA']);
      $category32 = Category::create(['name' => 'LEVANTAMIENTO DE DISPENSA POR MULTAS']);
      $category33 = Category::create(['name' => 'SOLICITUDES POR TEMAS DE ELECCIONES']);
      $category34 = Category::create(['name' => 'BOLSA DE TRABAJO']);
      $category35 = Category::create(['name' => 'QUEJA POR ALGUN TEMA DE GREMIALES Y BIENESTAR']);
      $category36 = Category::create(['name' => 'SOLICITUD DE CONVENIOS - CARTAS DE PRESENTACION']);

      $requirement1 = Requirement::create(['name' => 'BOLETOS DE VIAJE']);
      $requirement2 = Requirement::create(['name' => 'PASAPORTE CON SELLOS']);
      $requirement3 = Requirement::create(['name' => 'RECETAS MEDICAS EN CASO DE ENFERMEDAD']);
      $requirement4 = Requirement::create(['name' => 'CARTA DE LA REGIONAL DE DONDE PROVIENE']);
      $requirement5 = Requirement::create(['name' => 'CARTA SIMPLE DEL AGREMIADO']);
      $requirement6 = Requirement::create(['name' => 'CARTA DE PERSONA NATURAL O EMPRESA']);
      $requirement7 = Requirement::create(['name' => 'BOLETA DE PAGO']);
      $requirement8 = Requirement::create(['name' => 'NUMERO DE CUENTA PARA EL ABONO']);
      $requirement9 = Requirement::create(['name' => 'CARTA DE NACIONAL']);
      $requirement10 = Requirement::create(['name' => 'BOLETA DE PAGO POR DENUNCIA O QUEJA DE 150 SOLES']);
      $requirement11 = Requirement::create(['name' => 'BOLETA DE PAGO POR APELACION A CUENTA DE NACIONAL POR 300 SOLES']);
      $requirement12 = Requirement::create(['name' => 'DNI DEL SOLICITANTE']);
      $requirement13 = Requirement::create(['name' => 'DNI DEL FALLECIDO']);
      $requirement14 = Requirement::create(['name' => 'ACTA DE DEFUNCION']);
      $requirement15 = Requirement::create(['name' => 'PARTIDA DE NACIMIENTO']);
      $requirement16 = Requirement::create(['name' => 'PARTIDA DE MATRIMONIO']);
      $requirement17 = Requirement::create(['name' => 'DECLARACION JURADA SIMPLE']);
      $requirement18 = Requirement::create(['name' => 'BOLETAS DE GASTOS']);
      $requirement19 = Requirement::create(['name' => 'RECETAS MEDICAS']);
      $requirement20 = Requirement::create(['name' => 'CERTIFICADO MEDICO']);
      $requirement21 = Requirement::create(['name' => 'CERTIFICADO DE TRABAJO']);

      Typeprocedure::create(['name' => 'SOLICITUD DE CERTIFICADOS PENDIENTES AÑOS ANTERIORES', 'area_id' => $area1->id, 'category_id' => $category1->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'CONSTANCIA DE VALIDACIÓN DE CERTIFICACIÓN', 'area_id' => $area1->id, 'category_id' => $category2->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'SOLICITUD DE DIFUSIÓN', 'area_id' => $area1->id, 'category_id' => $category3->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'INFORMACIÓN DE ALGUN EVENTO O CURSOS', 'area_id' => $area1->id, 'category_id' => $category4->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'INSCRIPCION EXTEMPORANEA DE ALGUN CURSO', 'area_id' => $area1->id, 'category_id' => $category5->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'CONSTANCIA DE VALIDACIÓN DE CERTIFICACIÓN', 'area_id' => $area1->id, 'category_id' => $category6->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'SOLICITUD DE DIFUSIÓN', 'area_id' => $area1->id, 'category_id' => $category7->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'SOLICITUD DE PARTICIPACIÓN Y/O AUSPICIO EN ALGUN EVENTO EXTERNO', 'area_id' => $area1->id, 'category_id' => $category8->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'SOLICITUD DE TARIFARIO DE PUBLICIDAD EN CANALES DE COMUNICACIÓN DEL CAP RL', 'area_id' => $area1->id, 'category_id' => $category9->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'SOLICITUD PARA ORGANIZAR UN EVENTO CON EL CAP RL', 'area_id' => $area1->id, 'category_id' => $category10->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'DEVOLUCIÓN DE DINERO', 'area_id' => $area1->id, 'category_id' => $category11->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'QUEJA O RECLAMO DE ALGUNA ACTIVIDAD', 'area_id' => $area1->id, 'category_id' => $category12->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category13->id, 'price' => 0])->requirements()->sync([$requirement1->id, $requirement2->id]);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category14->id, 'price' => 0])->requirements()->sync([$requirement1->id, $requirement2->id]);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category15->id, 'price' => 0])->requirements()->sync($requirement3->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category16->id, 'price' => 0])->requirements()->sync($requirement4->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category17->id, 'price' => 0])->requirements()->sync($requirement5->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category18->id, 'price' => 0])->requirements()->sync($requirement6->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category19->id, 'price' => 0])->requirements()->sync($requirement6->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category20->id, 'price' => 0])->requirements()->sync($requirement5->id);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category21->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category22->id, 'price' => 0])->requirements()->sync([$requirement7->id, $requirement8->id]);
      Typeprocedure::create(['name' => 'AGREMIADOS', 'area_id' => $area2->id, 'category_id' => $category23->id, 'price' => 0])->requirements()->sync($requirement9->id);
      Typeprocedure::create(['name' => 'SEGUROS', 'area_id' => $area2->id, 'category_id' => $category24->id, 'price' => 0])->requirements()->sync([$requirement7->id, $requirement8->id]);
      Typeprocedure::create(['name' => 'COMITÉ DE ETICA', 'area_id' => $area2->id, 'category_id' => $category25->id, 'price' => 0])->requirements()->sync($requirement10->id);
      Typeprocedure::create(['name' => 'COMITÉ DE ETICA', 'area_id' => $area2->id, 'category_id' => $category26->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'COMITÉ DE ETICA', 'area_id' => $area2->id, 'category_id' => $category27->id, 'price' => 0])->requirements()->sync($requirement11->id);
      Typeprocedure::create(['name' => 'DEFUNCION', 'area_id' => $area2->id, 'category_id' => $category28->id, 'price' => 0])->requirements()->sync([$requirement12->id, $requirement13->id, $requirement14->id, $requirement15->id, $requirement16->id, $requirement17->id]);
      Typeprocedure::create(['name' => 'DEFUNCION', 'area_id' => $area2->id, 'category_id' => $category29->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'APOYO ECONOMICO', 'area_id' => $area2->id, 'category_id' => $category30->id, 'price' => 0])->requirements()->sync([$requirement18->id, $requirement19->id, $requirement20->id]);
      Typeprocedure::create(['name' => 'ELECCIONES', 'area_id' => $area2->id, 'category_id' => $category31->id, 'price' => 0])->requirements()->sync([$requirement1->id, $requirement20->id, $requirement21->id]);
      Typeprocedure::create(['name' => 'ELECCIONES', 'area_id' => $area2->id, 'category_id' => $category32->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'ELECCIONES', 'area_id' => $area2->id, 'category_id' => $category33->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'BOLSA DE TRABAJO', 'area_id' => $area2->id, 'category_id' => $category34->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'QUEJAS GREMIAL', 'area_id' => $area2->id, 'category_id' => $category35->id, 'price' => 0]);
      Typeprocedure::create(['name' => 'CONVENIOS', 'area_id' => $area2->id, 'category_id' => $category36->id, 'price' => 0]);
    }
}
