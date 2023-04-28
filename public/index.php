<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\QueryBuilder;

$query = new QueryBuilder;

// Pagination
$page = isset($_GET['page']) ? (int) $_GET["page"] : 1;
$limit = 10;
$offset = $limit * ($page - 1);
$total_pages = round($query->countRow('users') / $limit, 0);

if(isset($_GET['order'])) {
    $users =  $query->getAllUsers($limit, $offset, 'desc');
} else {
    $users =  $query->getAllUsers($limit, $offset);
}
// End pagination
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1></h1>
				<a href="/" class="btn btn-info">Home</a>
				<a href="?type=birth" class="btn btn-success">Birth</a>
                <?php

                if(isset($_GET['type'])) {
                    $users = $query->getByBirth('1980-01-01 00:00:00', '<');
                    include dirname(__DIR__) . '/templates/table.php';
                    echo '<br>';
                    $users = $query->getByBirth('1980-01-01 00:00:00',);
                    include dirname(__DIR__) . '/templates/table.php';
                } else { 
                ?>
                <nav aria-label="Пример навигации по страницам">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="<?=isset($_GET['page']) ? (isset($_GET['order']) ? '?page='.$page : '?order=desc&page='.$page) : (isset($_GET['order']) ? '/' : '?order=desc')?>" aria-label="desc">
                                <span aria-hidden="true"><?=isset($_GET['order']) ? 'desc':'asc'?></span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?=isset($_GET['order']) ? '?order=desc&page=1' : '?page=1' ?>" aria-label="First">
                                <span aria-hidden="true">first</span>
                            </a>
                        </li>
                        <? if($page>1) {?>
                            <li class="page-item"><a class="page-link" href="<?=isset($_GET['order']) ? '?order=desc&page='.($page-1) : '?page='.($page-1) ?>">prev</a></li>    
                        <? } ?>
                        <? if($page<$total_pages) {?>
                            <li class="page-item"><a class="page-link" href="<?=isset($_GET['order']) ? '?order=desc&page='.($page+1) : '?page='.($page+1) ?>">next</a></li>    
                        <? } ?>
                        <li class="page-item">
                            <a class="page-link" href="<?=isset($_GET['order']) ? '?order=desc&page='.$total_pages : '?page='.$total_pages ?>" aria-label="Last">
                                <span aria-hidden="true">last</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <? 
                    include dirname(__DIR__) . '/templates/table.php';    
                }
                ?>

			</div>
		</div>
	</div>
</body>
</html>