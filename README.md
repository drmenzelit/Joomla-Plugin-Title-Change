# Joomla-Plugin-Title-Change
Plugin to include HTML tags in titles. <br />
Background: Joomla strips HTML tags from titles (in articles or modules), so you cannot pu for example some part of the title in superscripts (that was a requirement from a client). A title like "34th Joomla Congress", the "th" cannot be put in superscripts. Or bold, or red or whatever... To solve this problem, I developed this plugin. Enclosing the part of the title you want to make different between {titlechange:yourclass and }, you get the text into a ``<span class="yourclass">`` tag. With the appropriate css definition you can change the text as you like. The opening "{titlechange:" and the closing "}" are fixed parts of the plugin pattern. "yourclass" can be what you want.<br />
<br />
Enclose your text between {titlechange:yourclass and } to include a span class in the title.<br />
<br />
Examples:<br />
This text should be {titlechange:sup superscript} and normal again.<br /> 
RESULTS IN<br />
This text should be ``<span class="sup">superscript</span>`` and normal again.<br />
Creating a css class .sup {vertical-align: super; font-size: smaller;} you get the text as superscript. <br />
<br />
This text should be {titlechange:red in red color} and normal again.<br /> 
RESULTS IN<br />
This text should be ``<span class="red">in red color</span>`` and normal again.<br />
Creating a css class .red {color: #ff0000;} you get the text in red color. <br />
