<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isocode')->unique();
            $table->boolean('enabled')->default(0);
            $table->timestamps();
        });

        Schema::table(
            'country', function (Blueprint $table) {
                $table->softDeletes();
            }
        );

DB::table('country')->insert(["id"=>1,"isocode"=> 'AF', "name"=>'Afganistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>2,"isocode"=> 'AX', "name"=>'Islas Gland',"enabled"=>0]);
DB::table('country')->insert(["id"=>3,"isocode"=> 'AL', "name"=>'Albania',"enabled"=>0]);
DB::table('country')->insert(["id"=>4,"isocode"=> 'DE', "name"=>'Alemania',"enabled"=>0]);
DB::table('country')->insert(["id"=>5,"isocode"=> 'AD', "name"=>'Andorra',"enabled"=>0]);
DB::table('country')->insert(["id"=>6,"isocode"=> 'AO', "name"=>'Angola',"enabled"=>0]);
DB::table('country')->insert(["id"=>7,"isocode"=> 'AI', "name"=>'Anguilla',"enabled"=>0]);
DB::table('country')->insert(["id"=>8,"isocode"=> 'AQ', "name"=>'Antártida',"enabled"=>0]);
DB::table('country')->insert(["id"=>9,"isocode"=> 'AG', "name"=>'Antigua y Barbuda',"enabled"=>0]);
DB::table('country')->insert(["id"=>10,"isocode"=> 'AN', "name"=>'Antillas Holandesas',"enabled"=>0]);
DB::table('country')->insert(["id"=>11,"isocode"=> 'SA', "name"=>'Arabia Saudí',"enabled"=>0]);
DB::table('country')->insert(["id"=>12,"isocode"=> 'DZ', "name"=>'Argelia',"enabled"=>0]);
DB::table('country')->insert(["id"=>13,"isocode"=> 'AR', "name"=>'Argentina',"enabled"=>0]);
DB::table('country')->insert(["id"=>14,"isocode"=> 'AM', "name"=>'Armenia',"enabled"=>0]);
DB::table('country')->insert(["id"=>15,"isocode"=> 'AW', "name"=>'Aruba',"enabled"=>0]);
DB::table('country')->insert(["id"=>16,"isocode"=> 'AU', "name"=>'Australia',"enabled"=>0]);
DB::table('country')->insert(["id"=>17,"isocode"=> 'AT', "name"=>'Austria',"enabled"=>0]);
DB::table('country')->insert(["id"=>18,"isocode"=> 'AZ', "name"=>'Azerbaiyán',"enabled"=>0]);
DB::table('country')->insert(["id"=>19,"isocode"=> 'BS', "name"=>'Bahamas',"enabled"=>0]);
DB::table('country')->insert(["id"=>20,"isocode"=> 'BH', "name"=>'Bahréin',"enabled"=>0]);
DB::table('country')->insert(["id"=>21,"isocode"=> 'BD', "name"=>'Bangladesh',"enabled"=>0]);
DB::table('country')->insert(["id"=>22,"isocode"=> 'BB', "name"=>'Barbados',"enabled"=>0]);
DB::table('country')->insert(["id"=>23,"isocode"=> 'BY', "name"=>'Bielorrusia',"enabled"=>0]);
DB::table('country')->insert(["id"=>24,"isocode"=> 'BE', "name"=>'Bélgica',"enabled"=>0]);
DB::table('country')->insert(["id"=>25,"isocode"=> 'BZ', "name"=>'Belice',"enabled"=>0]);
DB::table('country')->insert(["id"=>26,"isocode"=> 'BJ', "name"=>'Benin',"enabled"=>0]);
DB::table('country')->insert(["id"=>27,"isocode"=> 'BM', "name"=>'Bermudas',"enabled"=>0]);
DB::table('country')->insert(["id"=>28,"isocode"=> 'BT', "name"=>'Bhután',"enabled"=>0]);
DB::table('country')->insert(["id"=>29,"isocode"=> 'BO', "name"=>'Bolivia',"enabled"=>0]);
DB::table('country')->insert(["id"=>30,"isocode"=> 'BA', "name"=>'Bosnia y Herzegovina',"enabled"=>0]);
DB::table('country')->insert(["id"=>31,"isocode"=> 'BW', "name"=>'Botsuana',"enabled"=>0]);
DB::table('country')->insert(["id"=>32,"isocode"=> 'BV', "name"=>'Isla Bouvet',"enabled"=>0]);
DB::table('country')->insert(["id"=>33,"isocode"=> 'BR', "name"=>'Brasil',"enabled"=>0]);
DB::table('country')->insert(["id"=>34,"isocode"=> 'BN', "name"=>'Brunéi',"enabled"=>0]);
DB::table('country')->insert(["id"=>35,"isocode"=> 'BG', "name"=>'Bulgaria',"enabled"=>0]);
DB::table('country')->insert(["id"=>36,"isocode"=> 'BF', "name"=>'Burkina Faso',"enabled"=>0]);
DB::table('country')->insert(["id"=>37,"isocode"=> 'BI', "name"=>'Burundi',"enabled"=>0]);
DB::table('country')->insert(["id"=>38,"isocode"=> 'CV', "name"=>'Cabo Verde',"enabled"=>0]);
DB::table('country')->insert(["id"=>39,"isocode"=> 'KY', "name"=>'Islas Caimán',"enabled"=>0]);
DB::table('country')->insert(["id"=>40,"isocode"=> 'KH', "name"=>'Camboya',"enabled"=>0]);
DB::table('country')->insert(["id"=>41,"isocode"=> 'CM', "name"=>'Camerún',"enabled"=>0]);
DB::table('country')->insert(["id"=>42,"isocode"=> 'CA', "name"=>'Canadá',"enabled"=>0]);
DB::table('country')->insert(["id"=>43,"isocode"=> 'CF', "name"=>'República Centroafricana',"enabled"=>0]);
DB::table('country')->insert(["id"=>44,"isocode"=> 'TD', "name"=>'Chad',"enabled"=>0]);
DB::table('country')->insert(["id"=>45,"isocode"=> 'CZ', "name"=>'República Checa',"enabled"=>0]);
DB::table('country')->insert(["id"=>46,"isocode"=> 'CL', "name"=>'Chile',"enabled"=>1]);
DB::table('country')->insert(["id"=>47,"isocode"=> 'CN', "name"=>'China',"enabled"=>0]);
DB::table('country')->insert(["id"=>48,"isocode"=> 'CY', "name"=>'Chipre',"enabled"=>0]);
DB::table('country')->insert(["id"=>49,"isocode"=> 'CX', "name"=>'Isla de Navidad',"enabled"=>0]);
DB::table('country')->insert(["id"=>50,"isocode"=> 'VA', "name"=>'Ciudad del Vaticano',"enabled"=>0]);
DB::table('country')->insert(["id"=>51,"isocode"=> 'CC', "name"=>'Islas Cocos',"enabled"=>0]);
DB::table('country')->insert(["id"=>52,"isocode"=> 'CO', "name"=>'Colombia',"enabled"=>0]);
DB::table('country')->insert(["id"=>53,"isocode"=> 'KM', "name"=>'Comoras',"enabled"=>0]);
DB::table('country')->insert(["id"=>54,"isocode"=> 'CD', "name"=>'República Democrática del Congo',"enabled"=>0]);
DB::table('country')->insert(["id"=>55,"isocode"=> 'CG', "name"=>'Congo',"enabled"=>0]);
DB::table('country')->insert(["id"=>56,"isocode"=> 'CK', "name"=>'Islas Cook',"enabled"=>0]);
DB::table('country')->insert(["id"=>57,"isocode"=> 'KP', "name"=>'Corea del Norte',"enabled"=>0]);
DB::table('country')->insert(["id"=>58,"isocode"=> 'KR', "name"=>'Corea del Sur',"enabled"=>0]);
DB::table('country')->insert(["id"=>59,"isocode"=> 'CI', "name"=>'Costa de Marfil',"enabled"=>0]);
DB::table('country')->insert(["id"=>60,"isocode"=> 'CR', "name"=>'Costa Rica',"enabled"=>0]);
DB::table('country')->insert(["id"=>61,"isocode"=> 'HR', "name"=>'Croacia',"enabled"=>0]);
DB::table('country')->insert(["id"=>62,"isocode"=> 'CU', "name"=>'Cuba',"enabled"=>0]);
DB::table('country')->insert(["id"=>63,"isocode"=> 'DK', "name"=>'Dinamarca',"enabled"=>0]);
DB::table('country')->insert(["id"=>64,"isocode"=> 'DM', "name"=>'Dominica',"enabled"=>0]);
DB::table('country')->insert(["id"=>65,"isocode"=> 'DO', "name"=>'República Dominicana',"enabled"=>0]);
DB::table('country')->insert(["id"=>66,"isocode"=> 'EC', "name"=>'Ecuador',"enabled"=>0]);
DB::table('country')->insert(["id"=>67,"isocode"=> 'EG', "name"=>'Egipto',"enabled"=>0]);
DB::table('country')->insert(["id"=>68,"isocode"=> 'SV', "name"=>'El Salvador',"enabled"=>0]);
DB::table('country')->insert(["id"=>69,"isocode"=> 'AE', "name"=>'Emiratos Árabes Unidos',"enabled"=>0]);
DB::table('country')->insert(["id"=>70,"isocode"=> 'ER', "name"=>'Eritrea',"enabled"=>0]);
DB::table('country')->insert(["id"=>71,"isocode"=> 'SK', "name"=>'Eslovaquia',"enabled"=>0]);
DB::table('country')->insert(["id"=>72,"isocode"=> 'SI', "name"=>'Eslovenia',"enabled"=>0]);
DB::table('country')->insert(["id"=>73,"isocode"=> 'ES', "name"=>'España',"enabled"=>0]);
DB::table('country')->insert(["id"=>74,"isocode"=> 'UM', "name"=>'Islas ultramarinas de Estados Unidos',"enabled"=>0]);
DB::table('country')->insert(["id"=>75,"isocode"=> 'US', "name"=>'Estados Unidos',"enabled"=>0]);
DB::table('country')->insert(["id"=>76,"isocode"=> 'EE', "name"=>'Estonia',"enabled"=>0]);
DB::table('country')->insert(["id"=>77,"isocode"=> 'ET', "name"=>'Etiopía',"enabled"=>0]);
DB::table('country')->insert(["id"=>78,"isocode"=> 'FO', "name"=>'Islas Feroe',"enabled"=>0]);
DB::table('country')->insert(["id"=>79,"isocode"=> 'PH', "name"=>'Filipinas',"enabled"=>0]);
DB::table('country')->insert(["id"=>80,"isocode"=> 'FI', "name"=>'Finlandia',"enabled"=>0]);
DB::table('country')->insert(["id"=>81,"isocode"=> 'FJ', "name"=>'Fiyi',"enabled"=>0]);
DB::table('country')->insert(["id"=>82,"isocode"=> 'FR', "name"=>'Francia',"enabled"=>0]);
DB::table('country')->insert(["id"=>83,"isocode"=> 'GA', "name"=>'Gabón',"enabled"=>0]);
DB::table('country')->insert(["id"=>84,"isocode"=> 'GM', "name"=>'Gambia',"enabled"=>0]);
DB::table('country')->insert(["id"=>85,"isocode"=> 'GE', "name"=>'Georgia',"enabled"=>0]);
DB::table('country')->insert(["id"=>86,"isocode"=> 'GS', "name"=>'Islas Georgias del Sur y Sandwich del Sur',"enabled"=>0]);
DB::table('country')->insert(["id"=>87,"isocode"=> 'GH', "name"=>'Ghana',"enabled"=>0]);
DB::table('country')->insert(["id"=>88,"isocode"=> 'GI', "name"=>'Gibraltar',"enabled"=>0]);
DB::table('country')->insert(["id"=>89,"isocode"=> 'GD', "name"=>'Granada',"enabled"=>0]);
DB::table('country')->insert(["id"=>90,"isocode"=> 'GR', "name"=>'Grecia',"enabled"=>0]);
DB::table('country')->insert(["id"=>91,"isocode"=> 'GL', "name"=>'Groenlandia',"enabled"=>0]);
DB::table('country')->insert(["id"=>92,"isocode"=> 'GP', "name"=>'Guadalupe',"enabled"=>0]);
DB::table('country')->insert(["id"=>93,"isocode"=> 'GU', "name"=>'Guam',"enabled"=>0]);
DB::table('country')->insert(["id"=>94,"isocode"=> 'GT', "name"=>'Guatemala',"enabled"=>0]);
DB::table('country')->insert(["id"=>95,"isocode"=> 'GF', "name"=>'Guayana Francesa',"enabled"=>0]);
DB::table('country')->insert(["id"=>96,"isocode"=> 'GN', "name"=>'Guinea',"enabled"=>0]);
DB::table('country')->insert(["id"=>97,"isocode"=> 'GQ', "name"=>'Guinea Ecuatorial',"enabled"=>0]);
DB::table('country')->insert(["id"=>98,"isocode"=> 'GW', "name"=>'Guinea-Bissau',"enabled"=>0]);
DB::table('country')->insert(["id"=>99,"isocode"=> 'GY', "name"=>'Guyana',"enabled"=>0]);
DB::table('country')->insert(["id"=>100,"isocode"=> 'HT', "name"=>'Haití',"enabled"=>0]);
DB::table('country')->insert(["id"=>101,"isocode"=> 'HM', "name"=>'Islas Heard y McDonald',"enabled"=>0]);
DB::table('country')->insert(["id"=>102,"isocode"=> 'HN', "name"=>'Honduras',"enabled"=>0]);
DB::table('country')->insert(["id"=>103,"isocode"=> 'HK', "name"=>'Hong Kong',"enabled"=>0]);
DB::table('country')->insert(["id"=>104,"isocode"=> 'HU', "name"=>'Hungría',"enabled"=>0]);
DB::table('country')->insert(["id"=>105,"isocode"=> 'IN', "name"=>'India',"enabled"=>0]);
DB::table('country')->insert(["id"=>106,"isocode"=> 'ID', "name"=>'Indonesia',"enabled"=>0]);
DB::table('country')->insert(["id"=>107,"isocode"=> 'IR', "name"=>'Irán',"enabled"=>0]);
DB::table('country')->insert(["id"=>108,"isocode"=> 'IQ', "name"=>'Iraq',"enabled"=>0]);
DB::table('country')->insert(["id"=>109,"isocode"=> 'IE', "name"=>'Irlanda',"enabled"=>0]);
DB::table('country')->insert(["id"=>110,"isocode"=> 'IS', "name"=>'Islandia',"enabled"=>0]);
DB::table('country')->insert(["id"=>111,"isocode"=> 'IL', "name"=>'Israel',"enabled"=>0]);
DB::table('country')->insert(["id"=>112,"isocode"=> 'IT', "name"=>'Italia',"enabled"=>0]);
DB::table('country')->insert(["id"=>113,"isocode"=> 'JM', "name"=>'Jamaica',"enabled"=>0]);
DB::table('country')->insert(["id"=>114,"isocode"=> 'JP', "name"=>'Japón',"enabled"=>0]);
DB::table('country')->insert(["id"=>115,"isocode"=> 'JO', "name"=>'Jordania',"enabled"=>0]);
DB::table('country')->insert(["id"=>116,"isocode"=> 'KZ', "name"=>'Kazajstán',"enabled"=>0]);
DB::table('country')->insert(["id"=>117,"isocode"=> 'KE', "name"=>'Kenia',"enabled"=>0]);
DB::table('country')->insert(["id"=>118,"isocode"=> 'KG', "name"=>'Kirguistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>119,"isocode"=> 'KI', "name"=>'Kiribati',"enabled"=>0]);
DB::table('country')->insert(["id"=>120,"isocode"=> 'KW', "name"=>'Kuwait',"enabled"=>0]);
DB::table('country')->insert(["id"=>121,"isocode"=> 'LA', "name"=>'Laos',"enabled"=>0]);
DB::table('country')->insert(["id"=>122,"isocode"=> 'LS', "name"=>'Lesotho',"enabled"=>0]);
DB::table('country')->insert(["id"=>123,"isocode"=> 'LV', "name"=>'Letonia',"enabled"=>0]);
DB::table('country')->insert(["id"=>124,"isocode"=> 'LB', "name"=>'Líbano',"enabled"=>0]);
DB::table('country')->insert(["id"=>125,"isocode"=> 'LR', "name"=>'Liberia',"enabled"=>0]);
DB::table('country')->insert(["id"=>126,"isocode"=> 'LY', "name"=>'Libia',"enabled"=>0]);
DB::table('country')->insert(["id"=>127,"isocode"=> 'LI', "name"=>'Liechtenstein',"enabled"=>0]);
DB::table('country')->insert(["id"=>128,"isocode"=> 'LT', "name"=>'Lituania',"enabled"=>0]);
DB::table('country')->insert(["id"=>129,"isocode"=> 'LU', "name"=>'Luxemburgo',"enabled"=>0]);
DB::table('country')->insert(["id"=>130,"isocode"=> 'MO', "name"=>'Macao',"enabled"=>0]);
DB::table('country')->insert(["id"=>131,"isocode"=> 'MK', "name"=>'ARY Macedonia',"enabled"=>0]);
DB::table('country')->insert(["id"=>132,"isocode"=> 'MG', "name"=>'Madagascar',"enabled"=>0]);
DB::table('country')->insert(["id"=>133,"isocode"=> 'MY', "name"=>'Malasia',"enabled"=>0]);
DB::table('country')->insert(["id"=>134,"isocode"=> 'MW', "name"=>'Malawi',"enabled"=>0]);
DB::table('country')->insert(["id"=>135,"isocode"=> 'MV', "name"=>'Maldivas',"enabled"=>0]);
DB::table('country')->insert(["id"=>136,"isocode"=> 'ML', "name"=>'Malí',"enabled"=>0]);
DB::table('country')->insert(["id"=>137,"isocode"=> 'MT', "name"=>'Malta',"enabled"=>0]);
DB::table('country')->insert(["id"=>138,"isocode"=> 'FK', "name"=>'Islas Malvinas',"enabled"=>0]);
DB::table('country')->insert(["id"=>139,"isocode"=> 'MP', "name"=>'Islas Marianas del Norte',"enabled"=>0]);
DB::table('country')->insert(["id"=>140,"isocode"=> 'MA', "name"=>'Marruecos',"enabled"=>0]);
DB::table('country')->insert(["id"=>141,"isocode"=> 'MH', "name"=>'Islas Marshall',"enabled"=>0]);
DB::table('country')->insert(["id"=>142,"isocode"=> 'MQ', "name"=>'Martinica',"enabled"=>0]);
DB::table('country')->insert(["id"=>143,"isocode"=> 'MU', "name"=>'Mauricio',"enabled"=>0]);
DB::table('country')->insert(["id"=>144,"isocode"=> 'MR', "name"=>'Mauritania',"enabled"=>0]);
DB::table('country')->insert(["id"=>145,"isocode"=> 'YT', "name"=>'Mayotte',"enabled"=>0]);
DB::table('country')->insert(["id"=>146,"isocode"=> 'MX', "name"=>'México',"enabled"=>0]);
DB::table('country')->insert(["id"=>147,"isocode"=> 'FM', "name"=>'Micronesia',"enabled"=>0]);
DB::table('country')->insert(["id"=>148,"isocode"=> 'MD', "name"=>'Moldavia',"enabled"=>0]);
DB::table('country')->insert(["id"=>149,"isocode"=> 'MC', "name"=>'Mónaco',"enabled"=>0]);
DB::table('country')->insert(["id"=>150,"isocode"=> 'MN', "name"=>'Mongolia',"enabled"=>0]);
DB::table('country')->insert(["id"=>151,"isocode"=> 'MS', "name"=>'Montserrat',"enabled"=>0]);
DB::table('country')->insert(["id"=>152,"isocode"=> 'MZ', "name"=>'Mozambique',"enabled"=>0]);
DB::table('country')->insert(["id"=>153,"isocode"=> 'MM', "name"=>'Myanmar',"enabled"=>0]);
DB::table('country')->insert(["id"=>154,"isocode"=> 'NA', "name"=>'Namibia',"enabled"=>0]);
DB::table('country')->insert(["id"=>155,"isocode"=> 'NR', "name"=>'Nauru',"enabled"=>0]);
DB::table('country')->insert(["id"=>156,"isocode"=> 'NP', "name"=>'Nepal',"enabled"=>0]);
DB::table('country')->insert(["id"=>157,"isocode"=> 'NI', "name"=>'Nicaragua',"enabled"=>0]);
DB::table('country')->insert(["id"=>158,"isocode"=> 'NE', "name"=>'Níger',"enabled"=>0]);
DB::table('country')->insert(["id"=>159,"isocode"=> 'NG', "name"=>'Nigeria',"enabled"=>0]);
DB::table('country')->insert(["id"=>160,"isocode"=> 'NU', "name"=>'Niue',"enabled"=>0]);
DB::table('country')->insert(["id"=>161,"isocode"=> 'NF', "name"=>'Isla Norfolk',"enabled"=>0]);
DB::table('country')->insert(["id"=>162,"isocode"=> 'NO', "name"=>'Noruega',"enabled"=>0]);
DB::table('country')->insert(["id"=>163,"isocode"=> 'NC', "name"=>'Nueva Caledonia',"enabled"=>0]);
DB::table('country')->insert(["id"=>164,"isocode"=> 'NZ', "name"=>'Nueva Zelanda',"enabled"=>0]);
DB::table('country')->insert(["id"=>165,"isocode"=> 'OM', "name"=>'Omán',"enabled"=>0]);
DB::table('country')->insert(["id"=>166,"isocode"=> 'NL', "name"=>'Países Bajos',"enabled"=>0]);
DB::table('country')->insert(["id"=>167,"isocode"=> 'PK', "name"=>'Pakistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>168,"isocode"=> 'PW', "name"=>'Palau',"enabled"=>0]);
DB::table('country')->insert(["id"=>169,"isocode"=> 'PS', "name"=>'Palestina',"enabled"=>0]);
DB::table('country')->insert(["id"=>170,"isocode"=> 'PA', "name"=>'Panamá',"enabled"=>0]);
DB::table('country')->insert(["id"=>171,"isocode"=> 'PG', "name"=>'Papúa Nueva Guinea',"enabled"=>0]);
DB::table('country')->insert(["id"=>172,"isocode"=> 'PY', "name"=>'Paraguay',"enabled"=>0]);
DB::table('country')->insert(["id"=>173,"isocode"=> 'PE', "name"=>'Perú',"enabled"=>0]);
DB::table('country')->insert(["id"=>174,"isocode"=> 'PN', "name"=>'Islas Pitcairn',"enabled"=>0]);
DB::table('country')->insert(["id"=>175,"isocode"=> 'PF', "name"=>'Polinesia Francesa',"enabled"=>0]);
DB::table('country')->insert(["id"=>176,"isocode"=> 'PL', "name"=>'Polonia',"enabled"=>0]);
DB::table('country')->insert(["id"=>177,"isocode"=> 'PT', "name"=>'Portugal',"enabled"=>0]);
DB::table('country')->insert(["id"=>178,"isocode"=> 'PR', "name"=>'Puerto Rico',"enabled"=>0]);
DB::table('country')->insert(["id"=>179,"isocode"=> 'QA', "name"=>'Qatar',"enabled"=>0]);
DB::table('country')->insert(["id"=>180,"isocode"=> 'GB', "name"=>'Reino Unido',"enabled"=>0]);
DB::table('country')->insert(["id"=>181,"isocode"=> 'RE', "name"=>'Reunión',"enabled"=>0]);
DB::table('country')->insert(["id"=>182,"isocode"=> 'RW', "name"=>'Ruanda',"enabled"=>0]);
DB::table('country')->insert(["id"=>183,"isocode"=> 'RO', "name"=>'Rumania',"enabled"=>0]);
DB::table('country')->insert(["id"=>184,"isocode"=> 'RU', "name"=>'Rusia',"enabled"=>0]);
DB::table('country')->insert(["id"=>185,"isocode"=> 'EH', "name"=>'Sahara Occidental',"enabled"=>0]);
DB::table('country')->insert(["id"=>186,"isocode"=> 'SB', "name"=>'Islas Salomón',"enabled"=>0]);
DB::table('country')->insert(["id"=>187,"isocode"=> 'WS', "name"=>'Samoa',"enabled"=>0]);
DB::table('country')->insert(["id"=>188,"isocode"=> 'AS', "name"=>'Samoa Americana',"enabled"=>0]);
DB::table('country')->insert(["id"=>189,"isocode"=> 'KN', "name"=>'San Cristóbal y Nevis',"enabled"=>0]);
DB::table('country')->insert(["id"=>190,"isocode"=> 'SM', "name"=>'San Marino',"enabled"=>0]);
DB::table('country')->insert(["id"=>191,"isocode"=> 'PM', "name"=>'San Pedro y Miquelón',"enabled"=>0]);
DB::table('country')->insert(["id"=>192,"isocode"=> 'VC', "name"=>'San Vicente y las Granadinas',"enabled"=>0]);
DB::table('country')->insert(["id"=>193,"isocode"=> 'SH', "name"=>'Santa Helena',"enabled"=>0]);
DB::table('country')->insert(["id"=>194,"isocode"=> 'LC', "name"=>'Santa Lucía',"enabled"=>0]);
DB::table('country')->insert(["id"=>195,"isocode"=> 'ST', "name"=>'Santo Tomé y Príncipe',"enabled"=>0]);
DB::table('country')->insert(["id"=>196,"isocode"=> 'SN', "name"=>'Senegal',"enabled"=>0]);
DB::table('country')->insert(["id"=>197,"isocode"=> 'CS', "name"=>'Serbia y Montenegro',"enabled"=>0]);
DB::table('country')->insert(["id"=>198,"isocode"=> 'SC', "name"=>'Seychelles',"enabled"=>0]);
DB::table('country')->insert(["id"=>199,"isocode"=> 'SL', "name"=>'Sierra Leona',"enabled"=>0]);
DB::table('country')->insert(["id"=>200,"isocode"=> 'SG', "name"=>'Singapur',"enabled"=>0]);
DB::table('country')->insert(["id"=>201,"isocode"=> 'SY', "name"=>'Siria',"enabled"=>0]);
DB::table('country')->insert(["id"=>202,"isocode"=> 'SO', "name"=>'Somalia',"enabled"=>0]);
DB::table('country')->insert(["id"=>203,"isocode"=> 'LK', "name"=>'Sri Lanka',"enabled"=>0]);
DB::table('country')->insert(["id"=>204,"isocode"=> 'SZ', "name"=>'Suazilandia',"enabled"=>0]);
DB::table('country')->insert(["id"=>205,"isocode"=> 'ZA', "name"=>'Sudáfrica',"enabled"=>0]);
DB::table('country')->insert(["id"=>206,"isocode"=> 'SD', "name"=>'Sudán',"enabled"=>0]);
DB::table('country')->insert(["id"=>207,"isocode"=> 'SE', "name"=>'Suecia',"enabled"=>0]);
DB::table('country')->insert(["id"=>208,"isocode"=> 'CH', "name"=>'Suiza',"enabled"=>0]);
DB::table('country')->insert(["id"=>209,"isocode"=> 'SR', "name"=>'Surinam',"enabled"=>0]);
DB::table('country')->insert(["id"=>210,"isocode"=> 'SJ', "name"=>'Svalbard y Jan Mayen',"enabled"=>0]);
DB::table('country')->insert(["id"=>211,"isocode"=> 'TH', "name"=>'Tailandia',"enabled"=>0]);
DB::table('country')->insert(["id"=>212,"isocode"=> 'TW', "name"=>'Taiwán',"enabled"=>0]);
DB::table('country')->insert(["id"=>213,"isocode"=> 'TZ', "name"=>'Tanzania',"enabled"=>0]);
DB::table('country')->insert(["id"=>214,"isocode"=> 'TJ', "name"=>'Tayikistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>215,"isocode"=> 'IO', "name"=>'Territorio Británico del Océano Índico',"enabled"=>0]);
DB::table('country')->insert(["id"=>216,"isocode"=> 'TF', "name"=>'Territorios Australes Franceses',"enabled"=>0]);
DB::table('country')->insert(["id"=>217,"isocode"=> 'TL', "name"=>'Timor Oriental',"enabled"=>0]);
DB::table('country')->insert(["id"=>218,"isocode"=> 'TG', "name"=>'Togo',"enabled"=>0]);
DB::table('country')->insert(["id"=>219,"isocode"=> 'TK', "name"=>'Tokelau',"enabled"=>0]);
DB::table('country')->insert(["id"=>220,"isocode"=> 'TO', "name"=>'Tonga',"enabled"=>0]);
DB::table('country')->insert(["id"=>221,"isocode"=> 'TT', "name"=>'Trinidad y Tobago',"enabled"=>0]);
DB::table('country')->insert(["id"=>222,"isocode"=> 'TN', "name"=>'Túnez',"enabled"=>0]);
DB::table('country')->insert(["id"=>223,"isocode"=> 'TC', "name"=>'Islas Turcas y Caicos',"enabled"=>0]);
DB::table('country')->insert(["id"=>224,"isocode"=> 'TM', "name"=>'Turkmenistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>225,"isocode"=> 'TR', "name"=>'Turquía',"enabled"=>0]);
DB::table('country')->insert(["id"=>226,"isocode"=> 'TV', "name"=>'Tuvalu',"enabled"=>0]);
DB::table('country')->insert(["id"=>227,"isocode"=> 'UA', "name"=>'Ucrania',"enabled"=>0]);
DB::table('country')->insert(["id"=>228,"isocode"=> 'UG', "name"=>'Uganda',"enabled"=>0]);
DB::table('country')->insert(["id"=>229,"isocode"=> 'UY', "name"=>'Uruguay',"enabled"=>0]);
DB::table('country')->insert(["id"=>230,"isocode"=> 'UZ', "name"=>'Uzbekistán',"enabled"=>0]);
DB::table('country')->insert(["id"=>231,"isocode"=> 'VU', "name"=>'Vanuatu',"enabled"=>0]);
DB::table('country')->insert(["id"=>232,"isocode"=> 'VE', "name"=>'Venezuela',"enabled"=>0]);
DB::table('country')->insert(["id"=>233,"isocode"=> 'VN', "name"=>'Vietnam',"enabled"=>0]);
DB::table('country')->insert(["id"=>234,"isocode"=> 'VG', "name"=>'Islas Vírgenes Británicas',"enabled"=>0]);
DB::table('country')->insert(["id"=>235,"isocode"=> 'VI', "name"=>'Islas Vírgenes de los Estados Unidos',"enabled"=>0]);
DB::table('country')->insert(["id"=>236,"isocode"=> 'WF', "name"=>'Wallis y Futuna',"enabled"=>0]);
DB::table('country')->insert(["id"=>237,"isocode"=> 'YE', "name"=>'Yemen',"enabled"=>0]);
DB::table('country')->insert(["id"=>238,"isocode"=> 'DJ', "name"=>'Yibuti',"enabled"=>0]);
DB::table('country')->insert(["id"=>239,"isocode"=> 'ZM', "name"=>'Zambia',"enabled"=>0]);
DB::table('country')->insert(["id"=>240,"isocode"=> 'ZW', "name"=>'Zimbabue',"enabled"=>0]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
