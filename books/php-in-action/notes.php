<html>
	<head>
		<title>PHP in Action - Notes</title>
		<link rel="stylesheet" type="text/css" href="../../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
	</head>
	<body>
		<p class="breadcrumbs"><a href="../../index.php">PHP</a> &gt;&gt; <a href="../index.php">Books</a> &gt;&gt; <a href="notes.php">PHP in Action</a></p>
		<h1>PHP in Action - Notes - Started: 11/18/2012</h1>
		<h2>Chapter 1 - PHP and modern software development</h2>
		<h3>A pragmatic attitude</h3>
		<ul>
			<li>3 pages in, and I am already sensing an apologetic attitude, or at least an acknowledgement of PHP's weaknesses.</li>
		</ul>
		<h3>Overcoming PHP's limitations</h3>
		<ul>
			<li>Lacks type safety - PHP is dynamically typed.</li>
			<ul>
				<li>Unit tests provide a line of defense against errors - making up for a lack of compile-time catches</li>
				<li>Good OO practices can help to guard against possible type errors.</li>
			</ul>
			<li>Lacks namespaces - a "real deficiency" if building large projects or library software</li>
			<li>Performance and scalability issues</li>
			<ul>
				<li>"If you believe that using a specific programming language, or even a set of software tools, will guarantee performance and scalability, you will likely fail to achieve it."
			</ul>
			<li>Security issues</li>
		</ul>
		<h3>Unit testing and test-driven development</h3>
		<ul>
			<li>Tdd is less stressful and more satisfying.</li>
			<li>Less time searching for bugs and more time programming.</li>
		</ul>
		<h2>Chapter 2 - Objects in PHP</h2>
		<h3>Object Fundamentals</h3>
		<ul>
			<li>The goal of object-oriented programming: maintainable code.</li>
		</ul>
		<h3>Objects and classes</h3>
		<ul>
			<li>Worst metaphor (simile) for a class - "A class is like a house"</li>
		</ul>
		<h3>Hello World</h3>
		<ul>
			<li><a href="exercises/chapter-2/greeting.php">Object-oriented Hello World example</a></li>
			<li><a href="exercises/chapter-2/greeting_2.php">2nd Object-oriented Hello World example</a></li>
			<li><a href="exercises/chapter-2/greeting_3.php">3rd Object-oriented Hello World example - inheritance</a></li>
		</ul>
		<h3>Exception Handling</h3>
		<ul>
			<li>die() on error is "the software eauivalent of committing suicide if you miss a flight" - Martin Fowler</li>
			<li>There is a difference between an exception and an error.</li>
			<ul>
				<li>An error is typically something that's fatal or crippling to the program's ability to do its job.</li>
				<li>As exception is a situation that is uncommon, but recoverable.</li>
			</ul>
		</ul>
		<h3>Object references in PHP4 and PHP 5</h3>
		<ul>
			<li>As with most texts on call-by-ref vs call-by-value, I'm not sure if I understand it better or worse after reading it.</li>
		</ul>
		<h3>Intercepting Method Calls and Class Instantiation</h3>
		<ul>
			<li>The <a href="chapter-2/multiply.php">Java-style method overloading</a> seems like a real hack on first inspection, but I don't really get the call_user_func_array() call, yet.</li>
		</ul>
		<h3>A near aspect-oriented experience: logging method calls</h3>
		<ul>
			<li>After installing Homebrew >> Wget >> PEAR >> Log, I can't figure out where the PEAR Log class is trying to access tmp/user.log.  I tried a few of the easily suspected locations, but I don't know enough about Apache to know what I am doing.  Putting Apache administration and PEAR in the parking lot. </li>
		</ul>
		<h3>Autoloading classes</h3>
		<ul>
			<li>This seems like it might cause more trouble than what it's worth.</li>
			<li>This entire chapter seems like it is trying to convince me that PHP is still relevant, but it's coming across as a lesson in the dangers of feature envy.  Maybe (Probably) I just need more practice.</li>
		</ul>
		<h2>Chapter 3 - Using PHP classes effectively</h2>
	</body>
</html>