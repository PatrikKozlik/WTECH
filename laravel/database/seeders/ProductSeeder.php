<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert into products table
        DB::table('products')->insert([
            [
                'product_name' => 'Jedlo pre psa',
                'price' => 8.9,
                'number_of_products' => 30,
                'category_id' => 3,
                'supplier_id' => 2,
                'details' => 'Naše jedlo pre psov je skvelou voľbou pre majiteľov, ktorí chcú poskytnúť svojim psím priateľom najvyššiu kvalitu výživy. Naše jedlo je vyrobené z najkvalitnejších surovín a obsahuje všetky potrebné živiny pre zdravý a vyvážený život vášho psa. Naša receptúra pre jedlo pre psov je vytvorená s ohľadom na výživové potreby psov rôznych veľkostí, vekov a fyzických stavov. Je plné bielkovín, vitamínov a minerálov, ktoré pomáhajú udržiavať zdravé svaly, kosti a zuby, podporujú dobrú funkciu srdca a obehového systému a poskytujú energiu pre aktívneho psa.',
            ],
            [
                'product_name' => 'Jedlo pre mačku',
                'price' => 10,
                'number_of_products' => 30,
                'category_id' => 3,
                'supplier_id' => 1,
                'details' => 'Naše jedlo pre mačky je navrhnuté tak, aby poskytovalo vašej mačke všetky potrebné živiny pre zdravý a šťastný život. Je vyrobené z najvyššej kvality surovín, ktoré sú starostlivo vyberané a spracovávané, aby zachovali svoju výživovú hodnotu a chuť. Naša receptúra pre jedlo pre mačky je vytvorená s ohľadom na výživové potreby mačiek rôznych vekových skupín a fyzických stavov. Obsahuje vysoký podiel bielkovín, ktoré sú nevyhnutné pre zdravie svalov a kostí mačky, a tiež vitamíny a minerály, ktoré podporujú správne fungovanie srdca, pečene a obličiek.',
            ],
            [
                'product_name' => 'Jedlo pre rybičky',
                'price' => 2.99,
                'number_of_products' => 50,
                'category_id' => 3,
                'supplier_id' => 3,
                'details' => 'Jedlo pre rybičky by malo byť vhodne zvolené a vyvážené tak, aby poskytovalo všetky potrebné živiny pre ich zdravie a rast. Rybičky potrebujú bielkoviny, vitamíny a minerály, ktoré im pomôžu udržať si silné kosti a zdravú pokožku. Medzi vhodné potraviny pre rybičky patria rôzne druhy živých a suchých krmív, ako napríklad sušené krevety, mleté mäso, dážďovky, krmové granule a tablety, či kúsok zeleniny. Dôležité je dodržiavať správne množstvo krmiva a častosť kŕmenia.',
            ],
            [
                'product_name' => 'Granule',
                'price' => 24,
                'number_of_products' => 30,
                'category_id' => 3,
                'supplier_id' => 2,
                'details' => 'Naše jedlo pre psov je skvelou voľbou pre majiteľov, ktorí chcú poskytnúť svojim psím priateľom najvyššiu kvalitu výživy. Naše jedlo je vyrobené z najkvalitnejších surovín a obsahuje všetky potrebné živiny pre zdravý a vyvážený život vášho psa. Naša receptúra pre jedlo pre psov je vytvorená s ohľadom na výživové potreby psov rôznych veľkostí, vekov a fyzických stavov. Je plné bielkovín, vitamínov a minerálov, ktoré pomáhajú udržiavať zdravé svaly, kosti a zuby, podporujú dobrú funkciu srdca a obehového systému a poskytujú energiu pre aktívneho psa.',
            ],
            [
                'product_name' => 'Dobrota pre psa',
                'price' => 3.5,
                'number_of_products' => 2,
                'category_id' => 3,
                'supplier_id' => 2,
                'details' => 'Naša dobrotka pre psov je skvelým spôsobom, ako odmeniť vášho psa za dobré správanie alebo ho jednoducho potešiť. Je vyrobená z kvalitných a zdravých surovín, ktoré sú vhodné pre všetky plemená a veľkosti psov. Naša dobrotka je bohatá na bielkoviny a obsahuje minimálne množstvo tuku, čo ju robí ideálnou ako zdravá alternatíva k menej zdravým pochúťkam. Vaši psi budú určite milovať jej lahodnú chuť a vy môžete mať pokoj z toho, že dávate svojim psím priateľom len to najlepšie.',
            ],
            [
                'product_name' => 'Zrno pre vtákov',
                'price' => 5.3,
                'number_of_products' => 5,
                'category_id' => 3,
                'supplier_id' => 1,
                'details' => 'Zrno pre vtáky je skvelou voľbou pre majiteľov, ktorí chcú poskytnúť svojim vtákom kvalitnú stravu, ktorá im poskytne všetky potrebné živiny pre zdravý a šťastný život. Zrno je starostlivo vyberané a spracované, aby zachovalo svoju výživovú hodnotu a chuť, ktorá bude určite chutiť vašim vtákom. Obsahuje vysoký podiel bielkovín, vitamínov a minerálov, ktoré sú dôležité pre zdravie a vitalitu vtákov. Naše zrno pre vtáky je ľahko stráviteľné a má vynikajúcu kvalitu, ktorá poskytuje optimálnu výživu pre vašich miláčikov.',
            ],
            [
                'product_name' => 'Strava pre kone',
                'price' => 9.99,
                'number_of_products' => 5,
                'category_id' => 3,
                'supplier_id' => 2,
                'details' => 'Naše jedlo pre kone je navrhnuté tak, aby poskytovalo vašim koňom všetky potrebné živiny pre zdravý a šťastný život. Je vyrobené z najvyššej kvality surovín, ktoré sú starostlivo vyberané a spracovávané, aby zachovali svoju výživovú hodnotu a chuť. Naša receptúra pre jedlo pre kone je vytvorená s ohľadom na výživové potreby koní rôznych vekových skupín a výkonových kategórií. Obsahuje vysoký podiel bielkovín, ktoré sú nevyhnutné pre zdravie svalov a kostí koňa, a tiež vitamíny a minerály, ktoré podporujú správne fungovanie tráviaceho systému, srdca a imunitného systému.',
            ],
            [
                'product_name' => 'Zrno pre sliepky',
                'price' => 25.6,
                'number_of_products' => 5,
                'category_id' => 3,
                'supplier_id' => 1,
                'details' => 'Naše zrno pre sliepky je dokonalým spôsobom, ako poskytnúť vašim sliepkam zdravú a vyváženú stravu. Je to kombinácia výživových zložiek, ktoré obsahujú všetky potrebné živiny pre zdravie a vitalitu vašich sliepok.',
            ],
            [
                'product_name' => 'Obilie pre ovce',
                'price' => 3.3,
                'number_of_products' => 5,
                'category_id' => 3,
                'supplier_id' => 3,
                'details' => 'Naše obilie pre ovce je dokonalým zdrojom výživy pre vaše ovce. Je to kombinácia kvalitných surovín, ktoré obsahujú vysoký podiel bielkovín, vitamínov a minerálov, ktoré sú potrebné pre zdravie a vitalitu oviec. Naše obilie je starostlivo vyberané a spracovávané, aby zachovalo svoju výživovú hodnotu a chuť. Máme k dispozícii rôzne druhy obilia, aby vyhovovali potrebám a preferenciám vašich oviec.',
            ],
            [
                'product_name' => 'Zdrava vyziva pre psa',
                'price' => 5.3,
                'number_of_products' => 5,
                'category_id' => 3,
                'supplier_id' => 1,
                'details' => 'Zdravá výživa je kľúčom k zdraviu a dlhovekosti vášho psa. Naše jedlo pre psov je navrhnuté tak, aby poskytovalo vašim psom všetky potrebné živiny pre zdravý a šťastný život. Obsahuje vysoký podiel bielkovín, vitamínov a minerálov, ktoré podporujú správne fungovanie tráviaceho systému, srdca a imunitného systému. S našim jedlom pre psov si môžete byť istí, že poskytujete vašim psom výživu, ktorá im pomôže zostať zdraví a v dobrej kondícii. Vyskúšajte naše jedlo pre psov a uvidíte rozdiel v zdraví a vitalite vášho psa.',
            ],
            [
                'product_name' => 'Klbko pre mačku',
                'price' => 9.99,
                'number_of_products' => 1000,
                'category_id' => 1,
                'supplier_id' => 4,
                'details' => 'Máte doma mačku, ktorá má problémy s kĺbmi? Nezúfajte, máme pre vás riešenie! Predstavujeme vám náš nový produkt - klbko pre mačky. Naše klbko pre mačky je špeciálne navrhnuté tak, aby pomohlo zmierniť bolesti a podporilo zdravie kĺbov vašej mačky. Obsahuje všetky potrebné zložky pre podporu zdravia kĺbov, vrátane glukosamínu a chondroitínu, ktoré pomáhajú udržiavať spoje zdravé a pohyblivé.',
            ],
            [
                'product_name' => 'Hračka pre psa',
                'price' => 5,
                'number_of_products' => 100,
                'category_id' => 1,
                'supplier_id' => 5,
                'details' => 'Hračky sú pre našich psích priateľov veľmi dôležité. Okrem toho, že s nimi trávia čas a bavia sa, môžu im pomôcť udržiavať fyzickú kondíciu a mentálnu pohodu. Predstavujeme vám našu novú hračku pre psov.',
            ],
            [
                'product_name' => 'Domček pre včely',
                'price' => 130,
                'number_of_products' => 100,
                'category_id' => 2,
                'supplier_id' => 6,
                'details' => 'Včely sú dôležitými opylovačmi a ich počet sa v poslednej dobe znižuje. Preto sme vyvinuli náš nový produkt - včelí dom, ktorý poskytuje útulné a bezpečné miesto pre včely na život. Náš včelí dom je vyrobený z kvalitných a ekologických materiálov, ktoré sú priateľské k životnému prostrediu a neškodia včelám. Dom má správne rozmery a otvory, ktoré umožňujú včelám vstup a únik, a zároveň poskytujú dostatok priestoru pre ich potreby.',
            ],
            [
                'product_name' => 'Klietka pre vtáčika',
                'price' => 15.89,
                'number_of_products' => 3,
                'category_id' => 2,
                'supplier_id' => 7,
                'details' => 'Klietka pre vtáčika je praktický a bezpečný spôsob, ako poskytnúť vašim domácim vtákom príjemné a útulné miesto na život. Naša klietka je vyrobená z kvalitných a bezpečných materiálov, ktoré zabezpečujú dostatočnú ventiláciu a ochranu pred únikom vtákov. Klietka má aj praktické doplnky, ako sú kŕmidlo a napájacie nádobky, čo uľahčuje starostlivosť o vašich vtákov. Je to ideálny spôsob, ako poskytnúť vašim vtákom bezpečné a pohodlné prostredie na život.',
            ],
            [
                'product_name' => 'Dvojité vodítko',
                'price' => 15.89,
                'number_of_products' => 0,
                'category_id' => 2,
                'supplier_id' => 6,
                'details' => 'Klietka pre vtáčika je praktický a bezpečný spôsob, ako poskytnúť vašim domácim vtákom príjemné a útulné miesto na život. Naša klietka je vyrobená z kvalitných a bezpečných materiálov, ktoré zabezpečujú dostatočnú ventiláciu a ochranu pred únikom vtákov. Klietka má aj praktické doplnky, ako sú kŕmidlo a napájacie nádobky, čo uľahčuje starostlivosť o vašich vtákov. Je to ideálny spôsob, ako poskytnúť vašim vtákom bezpečné a pohodlné prostredie na život.',
            ],

        ]);
    }
}
