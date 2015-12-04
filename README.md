# Indiegogo - An unofficial Indiegogo client library

## Installation

- Add the following require to your `composer.json` require block:

    "require": {
        "prahladyeri/indiegogo": "dev-master"
    }

- Update composer:

	`composer update`

## Usage

Use `Loader::indie_get_comments()` to pull comments and `Loader::indie_get_contributions()` to pull contribution details.

	//get comments
	$data = Indiegogo\Loader::indie_get_comments('e88bd0a00305bfdfb18003a75665643b');
	echo $data->count . " comments fetched!\n";
	foreach($data->response as $comment){
		echo $comment->id, $comment->created_at, $comment->text,"\n";
		echo "\n";
	}

	//get contribs
	$data =  Indiegogo\Loader::indie_get_contributions('e88bd0a00305bfdfb18003a75665643b');
	echo $data->count . " contributions fetched!\n";
	foreach($data->response as $contrib){
		echo $contrib->id, $contrib->created_at, $contrib->amount, $contrib->by,"\n";
	}
