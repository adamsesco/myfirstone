<?php 
    ob_start();
    include("tpl/head.php"); 
?>
<title>Fxinvestorgate</title>
<?php include("tpl/header.php"); ?>

<div class="center_column white">
    <a href="newtopic.php" class="left add_new">اضافة مقال جديد</a>
    <h1>اخر المقالات</h1>
    <table class="flat-table">
        <?php $sql_news = mysql_query("SELECT * FROM `news_prin` ORDER BY `id` DESC");
            while($sql_news_r = mysql_fetch_array($sql_news)){
                
        ?>
        <tr>
            <td><?php echo $sql_news_r["id"]; ?></td>
            <td><?php echo mb_substr($sql_news_r["title"], 0, 100, "utf-8"); ?>...</td>
            <td><span class="small"><?php echo $sql_news_r["date"]; ?></span></td>
            <td>
                    <a class="edit" href="edit.php?id=<?php echo $sql_news_r["id"]; ?>&do=edit">تعديل</a>
                    <a class="delete" href="edit.php?id=<?php echo $sql_news_r["id"]; ?>&do=delete">حذف</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>