<?php

use App\Article;
use App\Contenu;
use App\ArticleTag;
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
        $article->top = true;
        $article->categorie_id = 2;
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

        $tag = new ArticleTag;
        $tag->article_id = $article->id;
        $tag->tag_id = 1;
        $tag->save();

        $tag = new ArticleTag;
        $tag->article_id = $article->id;
        $tag->tag_id = 2;
        $tag->save();

        $tag = new ArticleTag;
        $tag->article_id = $article->id;
        $tag->tag_id = 3;
        $tag->save();

        $article = new Article;
        $article->title = "La Ville";
        $article->image = "ville.jpg";
        $article->slug = "ville-nuit";
        $article->categorie_id = 3;
        $article->save();
       
        $contenu = new Contenu;
        $contenu->title = "Lorem, ipsum dolor";
        $contenu->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut laudantium ipsum, delectus omnis numquam nam exercitationem deleniti maiores consectetur fugit officiis eum impedit? Enim quo porro quos reprehenderit eius vero fuga aut, corrupti, quaerat aliquid atque incidunt delectus eaque quod quia, architecto nisi. Laudantium nihil itaque, aspernatur laborum autem placeat.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis cupiditate eaque voluptates, esse numquam saepe? Porro, odio voluptatem dolorem alias, eaque omnis a quidem libero, aliquid debitis nam? Laborum totam sed nobis! A fugiat assumenda provident ipsum tempora error nisi dolorum quod atque iusto commodi enim voluptatem aspernatur, quidem repellendus tempore illo pariatur laudantium rerum! Odit unde repellendus blanditiis tenetur!";
        $contenu->article_id = $article->id;
        $contenu->save();

        $contenu = new Contenu;
        $contenu->title = "Ville de Nuit";
        $contenu->image = "ville1.jpg";
        $contenu->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut laudantium ipsum, delectus omnis numquam nam exercitationem deleniti maiores consectetur fugit officiis eum impedit? Enim quo porro quos reprehenderit eius vero fuga aut, corrupti, quaerat aliquid atque incidunt delectus eaque quod quia, architecto nisi. Laudantium nihil itaque, aspernatur laborum autem placeat.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis cupiditate eaque voluptates, esse numquam saepe? Porro, odio voluptatem dolorem alias, eaque omnis a quidem libero, aliquid debitis nam? Laborum totam sed nobis! A fugiat assumenda provident ipsum tempora error nisi dolorum quod atque iusto commodi enim voluptatem aspernatur, quidem repellendus tempore illo pariatur laudantium rerum! Odit unde repellendus blanditiis tenetur!";
        $contenu->article_id = $article->id;
        $contenu->save();

        $tag = new ArticleTag;
        $tag->article_id = $article->id;
        $tag->tag_id = 4;
        $tag->save();

        $tag = new ArticleTag;
        $tag->article_id = $article->id;
        $tag->tag_id = 5;
        $tag->save();
    }
}
