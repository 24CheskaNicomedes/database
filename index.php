<? require ("php/layout_head.php"); ?>

<!-- 全幅圖片開始 -->
<div class="index-ad">
	<img src="images/ad1.jpg">
</div><!-- index-ad End -->
<!-- 全幅圖片結束 -->

<!-- 隨機呈現產品圖片開始 -->
<div class="index-tab">
	<div class="tabtit"><img src="images/tit-index.jpg"></div>
<? for ($i=1; $i<=4; $i++) { ?>
	<div class="tab4s">
		<li class="tab4s-img"><img src="images/temp.jpg"></li>
		<li class="tab4s-tit">這裡是標題</li>
	<div class="tab4s-txt">
		這裡是隨機呈現產品圖片的文字說明區塊這裡是隨機呈現產品圖片的文字說明區塊
	</div>
	<div class="tab4s-himg">
		<img title="前往" src="images/link-icon.png">
	</div>
	</div><!-- tab4s End -->
<? } ?>
</div><!-- index-tab End -->
<!-- 隨機呈現產品圖片結束 -->

<!-- 產品介紹按鈕開始 -->
<div class="w1000">
	<a class="btn2" title="PHP全能網頁設計師" href="prolist.php">PHP全能網頁設計師課桯介紹</a>
</div><!-- w1000 End -->
<!-- 產品介紹按鈕結束 -->

<? require ("php/layout_footer.php"); ?>

