<?php

?>
<html>
<?php include('/assets/head.html'); ?>
<body>
<?php
include('/assets/header.html');
$currentGroup = '';
if(count($products) == 0)
{
    echo '<h3>Sorry, no search results found. Please search for something else.</h3>';
    echo $this->view('searchbox');
}
echo " <ul class \"productgrid\">";
foreach($products as $key => $product)
{ 
    $groupId = $product->group_id;

    if($currentGroup != $product->group_id && isset($groupId))
    {
        $currentGroup = '';
    }

    if(isset($groupId) && $currentGroup == '')
    {
        $currentGroup  = $product->group_id;
        $id = $product->id;
     ?>

        <div class= "product">
         <li>

     <a href="viewproduct?id=<?php echo $id?>"><?php echo $product->title ?></a>

             </li>
            </div>
 <?php   }

}
 ?>
</ul>


</body>
</html>