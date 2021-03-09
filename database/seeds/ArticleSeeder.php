<?php

use App\Article;
use App\Contenu;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article;
        $article->title = "Des arbres blancs en hiver";
        $article->image = "arbreshiver.jpg";
        $article->slug = "arbres-blancs-hiver";
        $article->categorie_id = 3;
       $article->save();
       
        $contenu = new Contenu;
        $contenu->title = "Définition du blanc";
        $contenu->content = "Le blanc est un champ chromatique caractérisé par une impression de forte luminosité, sans aucune teinte dominante. On y est ;) Voilà ce qui arrive quand on fait une #sortiephotos dans les Vosges avec des conditions météo plus que moyennes pour ne pas dire exécrables. Du brouillard, une lumière crue et peu ou pas de couleurs. Je ne vous parle même pas des températures et du vent glacé. Malgré tout, le brouillard c’est toujours étrangement beau !
        Tuto photo : Comment photographier avec le brouillard
        Une fois rentré au camp de base (mon bureau), j’ai ouvert mes fichiers RAW et là je me suis dit : si tu veux tirer quelque chose de cette série, il faut tout passer en noir et blanc. Aussitôt dit aussitôt fait ! Dans ce nouvel article vous verrez donc des arbres gelés et couverts de neige passés en N&B. Mais aussi une superbe vidéo qui mélange forêts en hiver et ski acrobatique et enfin… des cigognes dans la neige !";
        $contenu->article_id = $article->id;
        $contenu->save();

        $contenu = new Contenu;
        $contenu->title = "L'hiver en Forêt";
        $contenu->image = "hiver.jpg";
        $contenu->article_id = $article->id;
        $contenu->save();
    }
}
