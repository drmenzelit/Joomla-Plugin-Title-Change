# Joomla-Plugin-Title-Change
Plugin to include HTML tags in titles. <br />Enclose your text between {titlechange:yourclass and } to include a span class in the title.<br />
Examples:<br />
This text should be {titlechange:sup superscript} and normal again.<br /> 
RESULTS IN<br />
This text should be <sup>superscript</sup> and normal again.<br />
Creating a css class .sup {vertical-align: super; font-size: smaller;} you get the text as superscript. <br />
<br />
This text should be {titlechange:red in red color} and normal again.<br /> 
RESULTS IN<br />
This text should be <span style='color:red;'>in red color</span> and normal again.<br />
Creating a css class .red {color: #ff0000;} you get the text in red color. <br />
