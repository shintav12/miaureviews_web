<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Post;
use App\Phrase;
use App\Video;
use App\Tag;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function Index(){
        
        $posts = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
            FROM post p 
            LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'post'
            GROUP BY p.id
            ORDER BY p.id DESC 
            LIMIT 5"));        
        $videos = DB::select(DB::raw("SELECT v.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
            FROM videos v
            LEFT JOIN images i ON v.id = i.object_id and i.object_type = 'video'
            GROUP BY v.id
            ORDER BY v.id DESC 
            LIMIT 7"));
            
        $phrases = Phrase::orderBy("id","DESC")->limit(3)->get();
        $hots = DB::select(DB::raw("select * from (
            (SELECT v.title,v.subtitle, v.slug, v.created_at, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'videos' as type 
                    FROM videos v
                    LEFT JOIN images i ON v.id = i.object_id and i.object_type = 'video'
                    GROUP BY v.id
                    ORDER BY v.id DESC 
                    LIMIT 5)
                    UNION ALL
            (SELECT p.title,p.subtitle, p.slug, p.created_at, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'posts' as type 
                    FROM post p
                    LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'post'
                    GROUP BY p.id
                    ORDER BY p.id DESC 
                    LIMIT 5)
                    UNION ALL
            (SELECT f.title,f.subtitle, f.slug, f.created_at, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'freebies' as type  
                    FROM frebies f
                    LEFT JOIN images i ON f.id = i.object_id and i.object_type = 'frebie'
                    GROUP BY f.id
                    ORDER BY f.id DESC 
                    LIMIT 5)
        ) results order by created_at DESC limit 5"));
        
        $template = [];
        $template["phrases"] = $phrases;
        $template["posts"] = $posts;
        $template["videos"] = $videos;
        $template["hots"] = $hots;

        return view("pages.index", $template);
    }

    public function sections($slug){
        $config = [];
        if( $slug == "posts" ) { $config["table"] = "post"; $config["type"] = "post"; $config["image"] = "portada-posts.png"; $config["title"] = "Posts"; }
        if( $slug == "videos" ) { $config["table"] = "videos"; $config["type"] = "video"; $config["image"] = "portada-videos.png"; $config["title"] = "Videos"; }
        if( $slug == "freebies" ) { $config["table"] = "frebies"; $config["type"] = "frebie"; $config["image"] = "portada-freebie.png"; $config["title"] = "Freebies"; }
        if( $slug == "store" ) { $config["table"] = "products"; $config["type"] = "product"; $config["image"] = "portada-tienda.png"; $config["title"] = "Tienda"; }
        $items = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  ".$config['table']." p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = '".$config['type']."'
        GROUP BY p.id
        ORDER BY p.id DESC"));    
        $template = []; 
        $template["items"] = $items;
        $template["config"] = $config;
        $template["slug"] = $slug;

        return view("pages.section", $template);
    }

    public function post($slug){
        $post = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  post p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'post'
        WHERE p.slug = '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC"))[0];
        $tags = DB::select(DB::raw("SELECT t.*
        FROM tags t
        JOIN object_tag ot on ot.tag_id = t.id
        WHERE ot.object_type = 'post'
        AND ot.object_id = ".$post->id));
        $related_items = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  post p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'post'
        WHERE p.slug != '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC
        LIMIT 3"));
        $post->content = json_decode($post->content);
        $post_metas = DB::table('metas')->where('object_id', $post->id)->where('type',"post")->first();
        
        $images = explode(",", $post->images);
        $template["tags"] = $tags;
        $template["item"] = $post;
        $template["images"] = $images;
        $template["slug"] = "posts";
        $template["metas"] = $post_metas;
        $template["related_items"] = $related_items;

        return view("pages.post", $template);
    }

    public function video($slug){
        $video = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  videos p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'video'
        WHERE p.slug = '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC"))[0];
        $tags = DB::select(DB::raw("SELECT t.*
        FROM tags t
        JOIN object_tag ot on ot.tag_id = t.id
        WHERE ot.object_type = 'video'
        AND ot.object_id = ".$video->id));
        $video->text = json_decode($video->text);
        $video->video = json_decode($video->video);
        $item_metas = DB::table('metas')->where('object_id', $video->id)->where('type',"video")->first();
        $images = explode(",", $video->images);
        $related_items = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  videos p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'video'
        WHERE p.slug != '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC
        LIMIT 3"));
        $template["tags"] = $tags;
        $template["item"] = $video;
        $template["images"] = $images;
        $template["slug"] = "videos";
        $template["metas"] = $item_metas;
        $template["related_items"] = $related_items;

        return view("pages.video", $template);
    }

    public function product($slug){
        $post = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  products p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'product'
        WHERE p.slug = '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC"))[0];
        $tags = DB::select(DB::raw("SELECT t.*
        FROM tags t
        JOIN object_tag ot on ot.tag_id = t.id
        WHERE ot.object_type = 'product'
        AND ot.object_id = ".$post->id));
        $related_items = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  products p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'product'
        WHERE p.slug != '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC
        LIMIT 3"));
        $post->content = json_decode($post->content);
        $post_metas = DB::table('metas')->where('object_id', $post->id)->where('type',"product")->first();

        $images = explode(",", $post->images);
        $template["tags"] = $tags;
        $template["item"] = $post;
        $num_images = count($images);
        $pos = 0;

        unset($images[$pos]);
        
        $template["images"] = $images;
        $template["slug"] = "product";
        $template["metas"] = $post_metas;
        $template["related_items"] = $related_items;

        return view("pages.store", $template);
    }

    public function freebie($slug){
        $post = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  frebies p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'frebie'
        WHERE p.slug = '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC"))[0];
        $tags = DB::select(DB::raw("SELECT t.*
        FROM tags t
        JOIN object_tag ot on ot.tag_id = t.id
        WHERE ot.object_type = 'frebie'
        AND ot.object_id = ".$post->id));
        $related_items = DB::select(DB::raw("SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images 
        FROM  frebies p 
        LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'frebie'
        WHERE p.slug != '".$slug."'
        GROUP BY p.id
        ORDER BY p.id DESC
        LIMIT 3"));
        $post->content = json_decode($post->content);
        $post_metas = DB::table('metas')->where('object_id', $post->id)->where('type',"frebie")->first();

        $images = explode(",", $post->images);
        $num_images = count($images);
        $pos = 0;

        unset($images[$pos]);
            
        unset($images[$pos]);
        $template["tags"] = $tags;
        $template["item"] = $post;
        $template["images"] = $images;
        $template["slug"] = "freebies";
        $template["metas"] = $post_metas;
        $template["related_items"] = $related_items;

        return view("pages.freebie", $template);
    }

    public function download($slug){
        $path = config('path_archive').$slug;
        return response()->download($path);

    }

    public function tags($slug){
        $tag_s = Tag::where("slug",$slug)->first();
        $tags = DB::select(DB::raw("SELECT ot.*
        FROM object_tag ot
        WHERE ot.tag_id = ".$tag_s->id."
        LIMIT 9"));

        $items = [];
        foreach($tags as $tag){
            switch($tag->object_type){
                case "post":{
                    $items[] = DB::select(DB::raw("SELECT p.*,GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'posts' as type  
                                                FROM post p 
                                                LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'post'
                                                WHERE p.id = ".$tag->object_id))[0];
                    break;
                }
                case "video":{
                    $items[] = DB::select(DB::raw("SELECT p.*,GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'videos' as type  
                                                FROM videos p 
                                                LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'video'
                                                WHERE p.id = ".$tag->object_id))[0];
                    break;
                }
                case "frebie":{
                    $items[] = DB::select(DB::raw("SELECT p.*,GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'freebies' as type  
                                                FROM frebies p 
                                                LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'frebie    '
                                                WHERE p.id = ".$tag->object_id))[0];
                    break;
                }
                case "product":{
                    $items[] = DB::select(DB::raw("SELECT p.*,GROUP_CONCAT(i.image ORDER BY i.image_type ASC SEPARATOR ',') as images, 'products' as type  
                                                FROM products p 
                                                LEFT JOIN images i ON p.id = i.object_id and i.object_type = 'product'
                                                WHERE p.id = ".$tag->object_id))[0];
                    break;
                }
            }
        }

        $template["items"] = $items;
        $template["tag"] = $tag_s;

        return view("pages.tags",$template);
    }
}
