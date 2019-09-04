<?php

namespace App\Console\Commands;

use App\Models\IdeModel;
use Illuminate\Console\Command;

class FillModelsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'models:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = '0, null, generic, PLAYER1, STAT_PLAYER, player, 0, null, 9,9					
1, cop, cop, COP, STAT_COP, man, 0, null, 9,9								
2, swat, swat, COP, STAT_COP, man, 0, null, 9,9								
3, fbi, fbi, COP, STAT_COP, man, 0, null, 9,9								
4, army, army, COP, STAT_COP, man, 0, null, 9,9								
5, medic, medic, EMERGENCY, STAT_MEDIC, man, 0, medic, 9,9					
6, fireman, fireman, FIREMAN, STAT_FIREMAN, man, 0, null, 9,9				
7, male01, male01, CIVMALE, STAT_SENSIBLE_GUY, man, 0, man, 1,4		
9, HFYST, HFYST, CIVFEMALE, STAT_STREET_GIRL, sexywoman, 013, null, 6,1				
10, HFOST, HFOST, CIVFEMALE, STAT_TOUGH_GIRL, woman, 417, null, 2,6
11, HMYST, HMYST, CIVMALE, STAT_GEEK_GUY, gang1, 5ab, null, 1,8
12, HMOST, HMOST, CIVMALE, STAT_OLD_GUY, man, 437, null, 5,6
13, HFYRI, HFYRI, CIVFEMALE, STAT_GEEK_GIRL, busywoman, 28d, null, 6,1		
14, HFORI, HFORI, CIVFEMALE, STAT_OLD_GIRL, woman, 28d, null, 2,6
15, HMYRI, HMYRI, CIVMALE, STAT_SUIT_GUY, man, 30d, null, 6,8
16, HMORI, HMORI, CIVMALE, STAT_SENSIBLE_GUY, man, 20d, null, 5,5	
17, HFYBE, HFYBE, CIVFEMALE, STAT_GEEK_GIRL, sexywoman, 28f, sunbathe, 6,1
18, HFOBE, HFOBE, CIVFEMALE, STAT_OLD_GIRL, fatwoman, 28f, sunbathe, 2,6
19, HMYBE, HMYBE, CIVMALE, STAT_TOUGH_GUY, gang2, 38d, sunbathe, 6,8
20, HMOBE, HMOBE, CIVMALE, STAT_TOURIST, fatman, 437, sunbathe, 7,5	
21, HFYBU, HFYBU, CIVFEMALE, STAT_SUIT_GIRL, busywoman, 08d, null, 2,7	
22, HFYMD, HFYMD, CIVFEMALE, STAT_SUIT_GIRL, busywoman, 0, null, 9,9		
23, HFYCG, HFYCG, CIVFEMALE, STAT_SENSIBLE_GIRL, woman, 0, null, 9,9				
24, HFYPR, HFYPR, PROSTITUTE, STAT_PROSTITUTE, sexywoman, 0, null, 9,9		
25, HFOTR, HFOTR, CIVFEMALE, STAT_TRAMP_FEMALE, shuffle, 0, null, 9,9
26, HMOTR, HMOTR, CIVMALE, STAT_TRAMP_MALE, shuffle, 0, null, 9,9
27, HMYAP, HMYAP, CIVMALE, STAT_SENSIBLE_GUY, gang1, 1bf, null, 4,7
28, HMOCA, HMOCA, CIVMALE, STAT_TAXIDRIVER, man, 040, null, 5,6	
29, BMODK, BMODK, CIVMALE, STAT_SENSIBLE_GUY, gang2, 7bf, null, 0,3	
30, BMYCR, BMYCR, CRIMINAL, STAT_CRIMINAL, gang2, 7ff, null, 0,3	
31, BFYST, BFYST, CIVFEMALE, STAT_SENSIBLE_GIRL, sexywoman, 4b7, null, 0,3	
32, BFOST, BFOST, CIVFEMALE, STAT_OLD_GIRL, oldwoman, 4f7, null, 2,2
33, BMYST, BMYST, CIVMALE, STAT_STREET_GUY, gang1, 73f, null, 0,3
34, BMOST, BMOST, CIVMALE, STAT_PSYCHO, man, 4b3, null, 7,5	
35, BFYRI, BFYRI, CIVFEMALE, STAT_GEEK_GIRL, busywoman, 28d, null, 3,1	
36, BFORI, BFORI, CIVFEMALE, STAT_OLD_GIRL, woman, 28d, null, 7,5
37, BMYRI, BMYRI, CIVMALE, STAT_GEEK_GUY, man, 30d, null, 0,3
38, BFYBE, BFYBE, CIVFEMALE, STAT_BEACH_GIRL, sexywoman, 29d, sunbathe, 1,8
39, BMYBE, BMYBE, CIVMALE, STAT_BEACH_GUY, gang1, 7ad, sunbathe, 0,3
40, BFOBE, BFOBE, CIVFEMALE, STAT_TOURIST, fatwoman, 287, sunbathe, 2,7		
41, BMOBE, BMOBE, CIVMALE, STAT_TOUGH_GUY, oldfatman, 68f, sunbathe, 3,1	
42, BMYBU, BMYBU, CIVMALE, STAT_SENSIBLE_GUY, man, 20d, null, 3,1
43, BFYPR, BFYPR, PROSTITUTE, STAT_PROSTITUTE, sexywoman, 0, null, 9,9		
44, BFOTR, BFOTR, CIVFEMALE, STAT_OLDSHOPPER, shuffle, 0, null, 9,9
45, BMOTR, BMOTR, CIVMALE, STAT_TRAMP_MALE, shuffle, 0, null, 9,9
46, BMYPI, BMYPI, CIVMALE, STAT_STREET_GUY, gang2, 0, null, 9,9
47, BMYBB, BMYBB, CIVMALE, STAT_BUSKER, man, 0, null, 9,9
48, WMYCR, WMYCR, CRIMINAL, STAT_CRIMINAL, gang1, 7ff, null, 4,7	
49, WFYST, WFYST, CIVFEMALE, STAT_STREET_GIRL, sexywoman, 09f, null, 1,8
50, WFOST, WFOST, CIVFEMALE, STAT_SENSIBLE_GIRL, oldwoman, 4b7, null, 2,2
51, WMYST, WMYST, CIVMALE, STAT_GEEK_GUY, gang1, 53f, null, 1,8
52, WMOST, WMOST, CIVMALE, STAT_STREET_GUY, man, 4f7, null, 4,7
53, WFYRI, WFYRI, CIVFEMALE, STAT_GEEK_GIRL, sexywoman, 28c, null, 1,8
54, WFORI, WFORI, CIVFEMALE, STAT_SHOPPER, woman, 28d, null, 7,5
55, WMYRI, WMYRI, CIVMALE, STAT_GEEK_GUY, man, 30d, null, 4,7
56, WMORI, WMORI, CIVMALE, STAT_SENSIBLE_GUY, man, 20d, null, 5,5	
57, WFYBE, WFYBE, CIVFEMALE, STAT_TOURIST, sexywoman, 28f, sunbathe, 1,8
58, WMYBE, WMYBE, CIVMALE, STAT_BEACH_GUY, gang1, 513, sunbathe, 4,4
59, WFOBE, WFOBE, CIVFEMALE, STAT_OLD_GIRL, fatwoman, 20f, sunbathe, 2,7
60, WMOBE, WMOBE, CIVMALE, STAT_BEACH_GUY, oldfatman, 67f, sunbathe, 1,7
61, WMYCW, WMYCW, CIVMALE, STAT_TOUGH_GUY, gang1, 4b3, null, 4,4
62, WMYGO, WMYGO, CIVMALE, STAT_SUIT_GUY, man, 28f, null, 7,5	
63, WFOGO, WFOGO, CIVFEMALE, STAT_SUIT_GIRL, oldwoman, 28d, null, 2,2	
64, WMOGO, WMOGO, CIVMALE, STAT_SUIT_GUY, oldman, 28f, null, 5,5
65, WFYLG, WFYLG, CIVFEMALE, STAT_TOUGH_GIRL, sexywoman, 0, null, 9,9			
66, WMYLG, WMYLG, CIVMALE, STAT_FIREMAN, gang1, 0, null, 9,9					
67, WFYBU, WFYBU, CIVFEMALE, STAT_SENSIBLE_GIRL, busywoman, 00d, null, 1,8
68, WMYBU, WMYBU, CIVMALE, STAT_GEEK_GUY, man, 20c, null, 1,4
69, WMOBU, WMOBU, CIVMALE, STAT_PSYCHO, man, 20d, null, 7,5	
70, WFYPR, WFYPR, PROSTITUTE, STAT_PROSTITUTE, sexywoman, 0, null, 9,9
71, WFOTR, WFOTR, CIVFEMALE, STAT_BEACH_GIRL, sexywoman, 0, null, 9,9
72, WMOTR, WMOTR, CIVMALE, STAT_OLD_GUY, man, 0, null, 9,9
73, WMYPI, WMYPI, CRIMINAL, STAT_CRIMINAL, gang1, 0, null, 9,9
74, WMOCA, WMOCA, CIVMALE, STAT_TAXIDRIVER, man, 0, null, 5,7	
75, WFYJG, WFYJG, CIVFEMALE, STAT_SENSIBLE_GIRL, jogwoman, 0, null, 9,9
76, WMYJG, WMYJG, CIVMALE, STAT_GEEK_GUY, jogger, 0, null, 9,9
77, WFYSK, WFYSK, CIVFEMALE, STAT_SKATER, skate, 0, skate, 9,9
78, WMYSK, WMYSK, CIVMALE, STAT_SKATER, skate, 0, skate, 9,9
79, WFYSH, WFYSH, CIVFEMALE, STAT_BEACH_GIRL, shopping, 0, null, 9,9		
80, WFOSH, WFOSH, CIVFEMALE, STAT_BEACH_GIRL, shopping, 0, null, 9,9
81, JFOTO, JFOTO, CIVFEMALE, STAT_TOURIST, woman, 0, null, 9,9	
82, JMOTO, JMOTO, CIVMALE, STAT_TOURIST, man, 30f, null, 0,3
83, CBa, CBa, GANG1, STAT_GANG1, gang1, 0, null, 6,6
84, CBb, CBb, GANG1, STAT_GANG1, gang2, 0, null, 6,6
85, HNa, HNa, GANG2, STAT_GANG2, gang1, 0, null, 3,1
86, HNb, HNb, GANG2, STAT_GANG2, gang2, 0, null, 3,1
87, SGa, SGa, GANG3, STAT_GANG3, gang1, 0, null, 1,8
88, SGb, SGb, GANG3, STAT_GANG3, gang1, 0, null, 1,8
89, CLa, CLa, GANG4, STAT_GANG4, gang1, 0, null, 6,7
90, CLb, CLb, GANG4, STAT_GANG4, gang2, 0, null, 6,7
91, GDa, GDa, GANG5, STAT_GANG5, gang1, 0, null, 4,7
92, GDb, GDb, GANG5, STAT_GANG5, gang1, 0, null, 4,7
93, BKa, BKa, GANG6, STAT_GANG6, gang1, 0, null, 4,4
94, BKb, BKb, GANG6, STAT_GANG6, gang1, 0, null, 4,4
95, PGa, PGa, GANG7, STAT_GANG7, gang1, 0, null, 9,9
96, PGb, PGb, GANG7, STAT_GANG7, gang1, 0, null, 9,9
97, vice1, vice1, COP, STAT_COP, man, 0, null, 9,9
98, vice2, vice2, COP, STAT_COP, man, 0, null, 9,9
99, vice3, vice3, COP, STAT_COP, man, 0, null, 9,9
100, vice4, vice4, COP, STAT_COP, man, 0, null, 9,9
101, vice5, vice5, COP, STAT_COP, man, 0, null, 9,9
102, vice6, vice6, COP, STAT_COP, man, 0, null, 9,9
103, vice7, vice7, COP, STAT_COP, man, 0, null, 9,9
104, vice8, vice8, COP, STAT_COP, man, 0, null, 9,9
105, WFYG1, WFYG1, CIVFEMALE, STAT_SENSIBLE_GIRL, sexywoman, 0, null, 9,9 
106, WFYG2, WFYG2, CIVFEMALE, STAT_SENSIBLE_GIRL, woman, 0, null, 9,9
109, special01, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
110, special02, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
111, special03, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
112, special04, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
113, special05, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
114, special06, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
115, special07, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
116, special08, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
117, special09, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
118, special10, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
119, special11, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
120, special12, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
121, special13, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
122, special14, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
123, special15, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
124, special16, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
125, special17, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
126, special18, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
127, special19, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
128, special20, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9
129, special21, generic, CIVMALE, STAT_STD_MISSION, man, 0, null, 9,9';

        $lines = preg_split('/[\r\n]+/sim', $data);
        $lines = collect($lines);

        $lines->each(function ($line) {
            list($id, $name) = preg_split('/\s*,\s*/sim', $line);

            $model = new IdeModel();
            $model->name = $name;
            $model->ide_id = $id;
            $model->save();
        });
    }
}
