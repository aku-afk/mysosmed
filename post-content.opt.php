
<h5>
    <b>Pilih mode <i>status</i> yang akan diposting</b>
</h5>
<br>

<form action="" name="stories_opt" method="POST">
<select class="form-control stories-opt" name="url" size="5" onchange="top.location=stories_opt.url.options[selectedIndex].value" >

<option selected hidden >-- Pilih Mode Status --</option>
<optgroup label="-- Pilih Mode Status --"></optgroup>
<option value="?statues=post&post_m=text#statues" >Hanya Teks</option>
<option value="?statues=post&post_m=media#statues" >Ambil Media Dari Perangkat</option>
<option value="?statues=post&post_m=url#statues" >Ambil Media Dari Url</option>

</select>
<noscript>
<style>
    .stories-opt {
        display:none;
    }
</style>
<ul>
    <li>
        <a href="?statues=post&post_m=text#statues">Hanya Teks</a>
    </li>
    <li>
        <a href="?statues=post&post_m=media#statues">Ambil Media Dari Perangkat</a>
    <li>
        <a href="?statues=post&post_m=url#statues">Ambil Media Dari Url</a>
</ul>
</noscript>
</form>
