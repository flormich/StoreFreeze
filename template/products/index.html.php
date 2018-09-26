<?php

include __DIR__ . "/../baseOpen.html.php";?>
<style> 
  .demo-list-action, .material-icons {margin:auto} 
  .fontTableau {
    margin:auto; 
    text-align:center; 
    background-color:#F3F3F3;
    width:80%;
    border-collapse:collapse;
    border:1px solid black;
    }
  a {text-decoration: none;}
  th {
    background-color:#FDFFCE;
    padding-top:20px;
    padding-bottom:20px;
  }
</style>

<!-- Textfield with Floating Label -->

<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
  <li class="mdl-list__item mdl-grid center-items">
    <h3>Create Products</h3>
  </li>
</ul>

<div class="mdl-grid">
  <form method="post" action="products/create">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
      <input class="mdl-textfield__input" type="text" name="name">
      <label class="mdl-textfield__label" for="sample3">Create Name Products</label>
    </div>

    <?php
      $categories = ['1=Viande', '2=Legume', '3=Plat maison', '4=Poisson', '5=Surgelé'];
      $liste = '<select>';
        foreach($categories as $category){
          $liste .= '<option value="'.$category.'">'.$category.'</option>';
        }
      $liste .= '</select>';
      echo $liste;
    ?>
      
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="category_id">
      <label class="mdl-textfield__label" for="sample3">Catégorie</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="unit">
      <label class="mdl-textfield__label" for="sample3">Create qté Unitaire</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="gram">
      <label class="mdl-textfield__label" for="sample3">Create qté en Gramme</label>
    </div>

    <button a class="mdl-list__item-secondary-action" href="./products/create"><i class="material-icons">done validate</i></a></button>


    <td><a class="mdl-list__item-secondary-action mdl-grid" href="./updates/index.html.php"><i class="material-icons">edit</i></a></td>


    <input type="hidden" name="token" value="<?=$token?>"></>
  </form>
</div>

<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
  <li class="mdl-list__item mdl-grid center-items">
    <h3>Products</h3>
  </li>
</ul>

<div class="demo-list-action mdl-list mdl-cell mdl-cell--10-col text-center">
  <div class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <table class="fontTableau" border="1">
        <ul>
          <tr>
            <th>Icone</th>
            <th>Nom Produit</th>
            <th>Nom Categories</th>
            <th>Qté Unitaire</th>
            <th>Qté en Gr</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </ul>
        <ul>
        <?php foreach ($products as $product): ?>
          <tr>
            <td><i class="material-icons">fastfood</i></td>
            <td><?=$product->getName()?></td>
            <td><?=$product->getCategory()?></td>
            <td><?=$product->getUnit()?></td>
            <td><?=$product->getGram()?></td>
            <td><a class="mdl-list__item-secondary-action mdl-grid" href="./products/updates"><i class="material-icons">edit</i></a></td>
            <td><a class="mdl-list__item-secondary-action mdl-grid" href="./products/delete/<?=$product->getId()?>?token=<?=$token?>"><i class="material-icons">delete</i></a></td>
          </tr>
        <?php endforeach;?>
        </ul>
      </table>
    </span>
  </div>
</div>
<?php

include __DIR__ . "/../baseClose.html.php";?>