<!--  		<?php 
 			var_dump($viewOptions);
 		?>

 -->    <div class="row">
      <div class="col-md-4 content-margin-top">
      <p><a href="/seed_blog/blogs/add" class="btn btn-info">新規投稿</a></p>
        <div class="msg">
        <?php foreach ($viewOptions as $viewOption): ?>
        	
          <p><a href="/seed_blog/blogs/show/<?php echo $viewOption['id']; ?>"><?php echo htmlspecialchars($viewOption['title'], ENT_QUOTES, 'UTF-8') ?></a></p>
          <p class="day">
              <?php echo htmlspecialchars($viewOption['created'], ENT_QUOTES, 'UTF-8') ?>
            [<a href="/seed_blog/blogs/edit/<?php echo $viewOption['id']; ?>" style="color: #00994C;">編集</a>]
            [<a onclick="return confirm('本当に削除してもよろしいですか？');" href="/seed_blog/blogs/delete/<?php echo $viewOption['id']; ?>" style="color: #F33;">削除</a>]
          </p>
          <?php endforeach ?>

        </div>

<!--         <div class="msg">
          <p><a href="show.html">タイトル３</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <p><a href="show.html">タイトル２</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <p><a href="show.html">タイトル１</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div>
      </div>
 -->
    </div>