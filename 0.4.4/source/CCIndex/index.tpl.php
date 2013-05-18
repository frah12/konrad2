<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: View for the Index controller
?>
<h1>This is the Konrad's Index Controller</h1>

<h2>Download and install Konrad</h2>
<p>You can download and install Konrad from github.</p>
<p>From a console/terminal program enter this:</p>
<blockquote>
<code>git clone git://github.com/frah12/konrad2.git</code>
</blockquote>
<p>
You will now need to change the <code>.htaccess</code> file, specifically the <code>RewriteBase</code>-line to reflect your installation directory ending in  <code>/konrad2/0.4.4</code> 
</p>
<p>
You will also need to make the <code>site/data</code> directory writable, and the file <code>ckonrad.sqlite</code> writable. So, <code>chmod 757</code> on the directory, and <code>chmod 666</code> on the file.
</p>
<p>
To make <code>less & semantic.gs</code> work you need to make the <code>themes/grid</code> directory writable. So <code>chmod 757</code> on that directory as well.
</p>
<p>
In <code>site/config.php</code> file you might need to change <code>$ko->config['theme']=array('path'=>'')</code> to <code>'themes/grid'</code> and change <code>$ko->config['theme']=array('stylesheet'=>'')</code> to <code>style.php</code> to initialize the frameworks default cascading stylesheet. When this is done, if it was needed, you need to change <code>$ko->config['theme']=array('path'=>'')</code> back to <code>'site/themes/mytheme'</code> and <code>$ko->config['theme']=array('stylesheet'=>'')</code> back to <code>style.css</code>. Or you need only do the last part, if you have a <code>style.less.cache</code> and <code>style.css</code> file in the <code>themes/grid</code> directory.
</p>

<p>You also might need to initialize one or more modules. You do this by the following link.</p>
<blockquote>
<a href='<?php echo create_url('modules/install'); ?>'>module/install</a>
</blockquote>

<p>You can review the source directly on github via this link: <a href='https://github.com/frah12/konrad2'>https://github.com/frah12/konrad2</a></p>