<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalcstaticdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calcstaticdate')->insert(
           [
               [
                   'name'=>'Общий срок деятельности компании',
                   'element_D'=>'200',
                   'element_e'=>'',
                   'element_a'=>'10',
                   'element_b'=>'15'
               ],
                [
               'name'=>'Срок франчайзинговой деятельности',
               'element_D'=>'11',
               'element_e'=>'',
               'element_a'=>'5',
               'element_b'=>'10'
                ],
               [
                   'name'=>'Размер инвестиций',
                   'element_D'=>'1600000',
                   'element_e'=>'1000000',
                   'element_a'=>'3.5',
                   'element_b'=>'200'
               ],
               [
                   'name'=>'Срок окупаемости в кол-во месяцев',
                   'element_D'=>'12',
                   'element_e'=>'',
                   'element_a'=>'-0.35',
                   'element_b'=>'15'
               ],
               [
                   'name'=>'Кол-во СОБСТ точек материнский регион',
                   'element_D'=>'647',
                   'element_e'=>'500000',
                   'element_a'=>'24',
                   'element_b'=>'10'
               ],
               [
                   'name'=>'Кол-во СОБСТ точек НЕ материн-й регионы',
                   'element_D'=>'3',
                   'element_e'=>'500000',
                   'element_a'=>'27',
                   'element_b'=>'30'
               ],
               [
                   'name'=>'Кол-во ФР точек материнский регион',
                   'element_D'=>'263',
                   'element_e'=>'500000',
                   'element_a'=>'101',
                   'element_b'=>'40'
               ],
               [
                   'name'=>'Кол-во ФР точек не материн-й регионы',
                   'element_D'=>'3',
                   'element_e'=>'500000',
                   'element_a'=>'20',
                   'element_b'=>'60'
               ],
               [
                   'name'=>'Кол-во повторных открытий',
                   'element_D'=>'400',
                   'element_e'=>'500000',
                   'element_a'=>'100',
                   'element_b'=>'25'
               ],
               [
                   'name'=>'Ко-во закрытий',
                   'element_D'=>'3',
                   'element_e'=>'500000',
                   'element_a'=>'2.00',
                   'element_b'=>'-10'
               ],
               [
                   'name'=>'Работа по мастер-франшизе (зарубежный владелец работающий по фр-зе в min 10 странах)',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'10'
               ],
               [
                   'name'=>'Кол-во стран с действующ по своей мастер-фр-зе (без регионов)',
                   'element_D'=>'3',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'3'
               ],
               [
                   'name'=>'Принадлежность к холдинговой структуре',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'5'
               ],
               [
                   'name'=>'Зарегистрированный Тов.знак ',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'5'
               ],
               [
                   'name'=>'Договор коммерч.концессии,дог.лицензии (только в Роспатенте)',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'5'
               ],
               [
                   'name'=>'Не предоставил контакты франчайзи (мин 20%)',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Результаты опроса франчайзи',
                   'element_D'=>'15',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'2'
               ],
               [
                   'name'=>'Предоставляет фин.модель на первичном этапе',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'5'
               ],
               [
                   'name'=>'Предоставление поддержки франчайзи например 5 из 10',
                   'element_D'=>'8',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'1'
               ],
               [
                   'name'=>'Переодическое самостоятельное обновление информации, по собствен инициативе',
                   'element_D'=>'',
                   'element_e'=>'да',
                   'element_a'=>'',
                   'element_b'=>'10'
               ],
               [
                   'name'=>'Признаки КРАСНЫЕ хотя бы один, если несколько то умножаются',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-100'
               ],
               [
                   'name'=>'Признаки ЖЕЛТЫЕ хотя бы один, если несколько то умножаются',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-50'
               ],
               [
                   'name'=>'Значительный рост суммы арбитражных дел в качестве истца за последние 12 месяцев',
                   'element_D'=>'65 000 000',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Значительный рост суммы арбитражных дел в качестве ответчика за последние 12 месяцев',
                   'element_D'=>'0',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Исполнительные производства (взыскание заложенного имущества)',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Существенное снижение выручки',
                   'element_D'=>'65 000 000',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Задолженность по уплате налогов',
                   'element_D'=>'20',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Значительная сумма исполнительных производств',
                   'element_D'=>'1000000',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-20'
               ],
               [
                   'name'=>'Организация зарегистрирована менее 12 месяцев назад.',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-3'
               ],
               [
                   'name'=>'Организация зарегистрирована менее 6 месяцев назад..',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-5'
               ],
               [
                   'name'=>'Организация зарегистрирована менее 3 месяцев назад.',
                   'element_D'=>'да',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'-10'
               ],
               [
                   'name'=>'Статистическая оценка отчётности',
                   'element_D'=>'80',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'0.50'
               ],
               [
                   'name'=>'Кредитоспособность',
                   'element_D'=>'45',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'0.45'
               ],
               [
                   'name'=>'Параметры светофора от контура (красные, желтые, зеленые)',
                   'element_D'=>'220',
                   'element_e'=>'',
                   'element_a'=>'',
                   'element_b'=>'0.10'
               ]

           ]

        );
    }
}
