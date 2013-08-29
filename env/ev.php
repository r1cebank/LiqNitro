<?php
$server_abs_path = "http://192.168.1.16/";
$api_path = "http://danbooru.donmai.us/";
$post_path = "posts.json";
$post_abs_path = "posts/#.json";
$post_vote_path = "posts/#/votes.json";
$post_flag_path = "post_flags.json";
$post_appeals_path = "post_appeals.json";
$uploads_path = "uploads.json";
$uploads_abs_path = "uploads/#.json";
$comments_path = "comments.json";
$comments_abs_path = "comments/#.json";
$mail_path = "dmails.json";
$mail_abs_path = "dmails/#.json";
$artists_path = "artists.json";
$artists_abs_path = "artists/#.json";
$notes_path = "notes.json";
$notes_abs_path = "notes/#.json";
$users_path = "users.json";
$users_abs_path = "users/#.json";
$pools_path = "pools.json";
$pools_abs_path = "pools/#.json";
$wiki_path = "wiki_pages.json";
$wiki_abs_path = "wiki_pages/#.json";
$forum_topics_path = "forum_topics.json";
$forum_topics_abs_path = "forum_topics/#.json";
$forum_posts_path = "forum_posts.json";
$forum_posts_abs_path = "forum_posts/#.json";
$post_versions = "post_versions.json";
$note_versions = "note_versions.json";
$pool_versions = "pool_versions.json";
$tag_aliases = "tag_aliases.json";
$tag_implications = "tag_implications.json";
$related_tags = "related_tag.json";
$preview_path = "ssd/data/preview/#.jpg";
$image_path = "data/#.@";
//#stands for md5 and @ is the original file ext
//Server Variables
$preview_save_path = "cache//preview//";
$full_save_path = "cache//full//";
$server_path = "http://localhost/";
$downloader_path = "downloader.php";
$stat_path = "stat/reqstat.txt";
class CODE {
	const OK = 200;
	const FORBIDDEN = 403;
	const NOT_FOUND = 404;
	const INVALID_RECORD = 420;
	const THROTTLED = 421;
	const LOCKED = 422;
	const EXIST = 423;
	const INVALID_PARAM = 424;
	const SERVER_ERROR = 500;
	const SERVICE_UNAVAILABLE = 503;
}
?>