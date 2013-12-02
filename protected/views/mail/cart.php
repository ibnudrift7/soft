<?php /*
<h2>Pemesanan Kamar</h2>

<p>Data Pemesan</p>
<p>
	<b>Name:</b> <?php echo $model->name ?><br/>
	<b>Address:</b> <?php echo $model->address ?><br/>
	<b>Telp:</b> <?php echo $model->telp ?><br/>
	<b>Email:</b> <?php echo $model->email ?><br/>
	<b>Credit Card:</b> <?php echo $model->credit_card ?><br/>
</p>
Deskripsi Pemesanan
<p>
	<b>Check In:</b> <?php echo $model2->date_add ?><br/>
	<b>Check Out:</b> <?php echo $model2->date_end ?><br/>
	<b>Adults:</b> <?php echo $model2->adults ?><br/>
	<b>Children:</b> <?php echo $model2->children ?><br/>
	<b>Room:</b> <?php echo $model2->room ?><br/>
	<b>Package:</b> <?php echo $model2->pack->name ?><br/>
</p>
*/ ?>
<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff"><div class="adM">
</div><table width="100%" cellspacing="0" cellpadding="0" style="BORDER-BOTTOM:#0a5aaa 2px solid">
<tbody>
<tr valign="bottom" align="left">
<td width="" height="62"><a target="_blank" name="" href="<?php echo $url.CHtml::normalizeUrl(array('/main/index', 'lang'=>Yii::app()->language)) ?>"><img width="180" height="62" src="<?php echo $baseUrl ?>/asset/images/logo-xado.png"></a></td>
<td width="" style="PADDING-BOTTOM:7px"><a target="_blank" style="COLOR:#333333" name="13dfb4e6cefb328b_ANCHOR3651534" href="<?php echo $url.CHtml::normalizeUrl(array('/main/index')) ?>"><strong><?php echo Yii::t('main','HOME') ?></strong></a></td>
<td width="" style="PADDING-BOTTOM:7px"><a target="_blank" style="COLOR:#333333" name="13dfb4e6cefb328b_ANCHOR3651536" href="<?php echo $url.CHtml::normalizeUrl(array('/main/contact')) ?>"><strong><?php echo Yii::t('main','CONTACT US') ?></strong></a></td>
</tr>
</tbody>
</table>
<font face="tahoma, arial"> 
<h2>Informasi Pemesan</h2>
<table border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="3">Data Pemesan</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $model->name ?></td>
	</tr>
	<tr>
		<td>Telephone</td>
		<td>:</td>
		<td><?php echo $model->phone ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $model->email ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $model->address ?><br>
			<?php echo $model->address2 ?>
		</td>
	</tr>
	<tr>
		<td>Kota</td>
		<td>:</td>
		<td><?php echo $model->kota ?></td>
	</tr>
	<tr>
		<td>Provinsi</td>
		<td>:</td>
		<td><?php echo $model->province ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">Informasi Pengiriman</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $model2->name ?></td>
	</tr>
	<tr>
		<td>Telephone</td>
		<td>:</td>
		<td><?php echo $model2->phone ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $model2->address ?><br>
			<?php echo $model2->address2 ?>
		</td>
	</tr>
	<tr>
		<td>Kota</td>
		<td>:</td>
		<td><?php echo $model2->kota ?></td>
	</tr>
	<tr>
		<td>Provinsi</td>
		<td>:</td>
		<td><?php echo $model2->province ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<br /><br />
<table border="1"  width="100%" cellpadding="0" cellspacing="0">
	<tr bgcolor="#eee">
		<th style="border-spacing: 0;">Items:</th>
		<th style="border-spacing: 0;">Qty</th>
		<th style="border-spacing: 0;">Total</th>
	</tr>
	<?php
	$tot = 0;
	?>
	<?php foreach ($cart as $key => $value): ?>
	<?php
		$product = Product::model()->findByPk($value['id']);
	?>
	<tr>
		<td style="border-spacing: 0;"><?php echo $product->title.' @IDR '.$product->price ?></td>
		<td style="border-spacing: 0;"><?php echo $value['qty'] ?></td>
		<td style="border-spacing: 0;">IDR <?php echo number_format($value->qty*$product->price,2) ?></td>
	</tr>
	<?php
	$tot = $tot + ($value->qty*$product->price);
	?>
	<?php endforeach ?>
	<tr>
		<td style="border-spacing: 0;" colspan="2"><b>TOTAL</b></td>
		<td style="border-spacing: 0;">IDR <?php echo number_format($tot,2) ?></td>
	</tr>
</table>
</font>
<table width="100%" height="90" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td bgcolor="#f5f5f5" align="left" colspan="2" style="PADDING-BOTTOM:8px;LINE-HEIGHT:14px;PADDING-LEFT:8px;PADDING-RIGHT:8px;FONT-SIZE:11px;PADDING-TOP:8px">Harap tidak mengirimkan balasan melalui alamat ini, karena kami tidak dapat menanggapi surat yang dikirimkan ke alamat ini.<br>
&nbsp;&nbsp; - Kami akan segera menghubungi anda untuk mengkonfirmasi pesanan anda<br />
&nbsp;&nbsp; - Order Barang tidak berlaku bila pihak kami belum mengkonfirmasi pesanan anda<br />
&nbsp;&nbsp; - Hubungi kami di email ini <a href="mailto:<?php echo $this->setting['email']['value'] ?>"><?php echo $this->setting['email']['value'] ?></a><br />
</td>
</tr>
<tr>
<td align="left" style="FONT-SIZE:11px">Copyright XADO.co.id - 2013. Website design by <a href="http://markdesign.net">Mark Design</a>. </td>
</tr>
</tbody>
</table>
