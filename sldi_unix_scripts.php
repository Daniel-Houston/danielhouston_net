<?php require 'main_head.php'?>
<?php require 'navbar.php';?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr class="page-title">
                <h2 class="intro-text text-center bc-header">Unix Shell Scripting
                </h2>
                <hr class="page-title">
				<p>This was the first assignment in my scripting language design class. We were given 10 scripts to write. A description for each one is in the comments of the code. </p>
				
				<div class=""><a href="#visibleEquity">Visible Equity</a> | <a href="#schoolProjects">School Projects</a></div>
            
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">Gordo</h2>
				<pre># Find the five largest subdirectories of the current directory:
				<hr class="page-title">
du --max-depth=1 | sort -rn | awk 'NR&gt;=2&&NR&lt;=6' | cut -f 2</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">mp3dups</h2>
				<hr class="page-title">
				<pre>
# Search all subdirectories of the current subdirectory.

# If there are two (or more) files with identical file contents both named
# .mp3, print the path to each of them.

# To do this efficiently, you may want to use md5sum.

# Create a temp file to hold all md5 sums along with the filenames.
touch mp3Dups_temp

# First we need to get the md5sum of all *.mp3 files
for file in $(find . -name '*.mp3' -type f )
do
fileHash=$( md5sum $file | awk '{print $1}')
printf "%s\n" "$fileHash $file"
done &gt; mp3Dups_temp

#sort mp3Dups_temp | uniq --skip-fields=2 mp3Dups_temp
# Then read in each filename and hash, and compare the hash with the other hashes in the file.
while read line; 
do 
fileHash=$(printf "%s" "$line" | awk '{print $1}')
fileName=$(printf "%s" "$line" | awk '{print $2}')


while read line;
do
# If the hashes are the same and the filenames are not then print out the duplicate file.  
compareHash=$(printf "%s" "$line" | awk '{print $1}')
compareName=$(printf "%s" "$line" | awk '{print $2}')

if [[ "$fileHash" == "$compareHash" && "$fileName" != "$compareName" ]]
then
  printf "%s\n" "$fileName"
  break;
fi
done &lt; mp3Dups_temp
done &lt; mp3Dups_temp | sort
rm -f mp3Dups_temp </pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">recap</h2>
				<hr class="page-title">
				<pre>
# Assume a list of names enters STDIN.

# Print a list of properly recapitalized names on STDOUT.

# Each input name will match the following regex:

# [A-Za-z]+( [A-Za-z]+\.?)? [A-Za-z]+( [A-Za-z]+)*(-[A-Za-z]+)?

# Here are the rules for capitalization in multiword last names:

# "del" or "de la" preceeding another name should remain lowercase.
# ex: daniel de la pava =&gt; Daniel de la Pava

# "von" preceeding another name should remain lowercase.
# ex: bill von ouster =&gt; Bill von Ouster

# "Van" preceeding another name should be capitalized.
# ex: david van horn =&gt; David Van Horn

# Hyphenated last names should have both name capitalized.
# ex: mike basen-mitchell =&gt; Mike Basen-Mitchell
# ex: simon peyton-jones =&gt; Simon Peyton-Jones

# For all other multiword last names, capitalize each word.

# Read names one line at a time using sed

while read line; 
do
# Get the name in lowercase and then uppercase the first letters of every name.
name=$(printf "%s" "$line" | tr [A-Z] [a-z] | sed -r 's/\b./\U&\E/g')

# Print the first name as it is since there are no special cases. 
firstName=$(printf "%s" "$name" | awk '{ print $1 }')
printf "%s " "$firstName"

# Check for special cases 
middleStuff=$(printf "%s" "$name" | awk '{for (i=2; i < NF; i++) printf $i " " }' | sed -r 's/\bVon[ ]/von /' | sed -r 's/\bDel[ ]/del /' | sed -r 's/\bDe[ ]La[ ]/de la /')


printf "%s" "$middleStuff";
printf "%s" "$name" | awk '{print $NF}' ;

#echo "";

done;
				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">oxbane</h2>
				<hr class="page-title">
				<pre>
				
# This script should output all words in 
# /usr/share/dict/words that have x as their second letter
# and n as the second-to-last letter.

# Go through the file using awk to find any strings that match the regular expression
awk '/^(.x.*n.)$/ {print}' /usr/share/dict/words

				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">rot13</h2>
				<hr class="page-title">
				<pre>
				
# Apply rot13 encoding/decoding to STDIN.

# Read a word in, rotate its characters 13 spaces.
while read word;
do
echo "$word" | tr 'A-Za-z' 'N-ZA-Mn-za-m';
done;
				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">space-invader</h2>
				<hr class="page-title">
				<pre>
# For all files in the current directory, replace
# any spaces in file names with underscores.

# If performing the rename would clash with an existing file,
# do not rename the file and print a warning on stderr.


# First I need to get each file in the current directory. 
for file in ./*;
do
# If the filname has a space in it. 
if [[ "$file" == *[[:space:]]* ]]
then
# Then replace all spaces with underscores. 
file_name=${file:2}
new_file_name="$(echo -n "$file_name" | sed -e 's/[[:space:]]/_/g')";

# Check to be sure that a filename isn't already there. 
if ! ls | grep -q "$new_file_name" ;
then
  mv "$file" "$new_file_name";
else
  echo "Warning: $file_name cannot be renamed because $new_file_name already exists." &gt;&2
fi
fi
done; 

				</pre>				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">intersect</h2>
				<hr class="page-title">
				<pre>
# If $1 and $2 are file names, output the lines they have in common.

# You may not assume that these files have been sorted.

# You may output each line only once, and the order does not matter.

# Check usage:
if [[ ! ( -n "$1" && -n "$2") ]]
then
echo "usage: `basename $0` file1 file2"
exit 1
fi

# Print lines in common:
# These temp files are used to sort both input files before comparing them
touch temp1 temp2;

sort "$1" &gt; temp1;
sort "$2" &gt; temp2;

# Now because they're sorted we can compare them. 
comm -12 temp1 temp2 | sort -n

# Now remove the temporary files
rm temp1 temp2;
				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">crackgen</h2>
				<hr class="page-title">
				<pre>
# usage: crackgen &lt;word-file&gt;

# This program will generate the password databases
# accepted by passcrack.

# Its first argument is a word file (like /usr/share/dict/words).

# It will output a password database with the format:

# &lt;word&gt;:&lt;shasum-of-word&gt;

# verify arg:
if [[ ! -n "$1" ]]
then
echo "usage: `basename $0` word_file"
exit 1
fi

# Read a word, get its shasum, and echo the word and shasum in the correct format
while read word;
do
hash=$(printf "%s" "$word" | shasum | awk '{print $1}')
printf "%s\n" "$word:$hash"  
done &lt; "$1"

				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">passcrack</h2>
				<hr class="page-title">
				<pre>
# usage: passcrack &lt;account-db&gt; &lt;password-db&gt;

# This program will attempt to crack passwords
# in an improperly hashed account database.

# The format of the account database is:

#  &lt;account-name&gt;:&lt;shasum-of-password&gt;

# An example of this database is ../data/crackable.db

# For example, if "matt" has password "love",
# then there will be an entry for:

# matt:9f2feb0f1ef425b292f2f94bc8482494df430413

# because:

# $ echo -n love | shasum
# 9f2feb0f1ef425b292f2f94bc8482494df430413

# The format of a password database file is:

#  &lt;password&gt;:&lt;shasum-of-password&gt;

# This script should print the account-name and password
# for any account whose password was in the password-db.

# The output format is:

# &lt;account-name&gt;:&lt;password&gt;

# Usage:
if [[ ! -n "$1" || ! -n "$2" ]]
then
echo "usage: `basename $0` &lt;accountdb&gt; &lt;passdb&gt;"
exit 1
fi

# for each password in the password-db
# Go through the account-db and compare shasum hashes
while read line; 
do
password=$(printf "%s" "$line" | awk -F ':' '{print $1}')
hash=$(printf "%s" "$line" | awk -F ':' '{print $2}')

if grep -q "$hash" "$1"
then
 username=$(grep "$hash" "$1" | awk -F ':' '{print $1}')  
printf "%s\n" "$username:$password"
fi

done &lt; "$2"
				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr class="page-title">
				<h2 class="intro-text text-center bc-header">validate</h2>
				<hr class="page-title">
				<pre>
# usage: validate &lt;account-db&gt; &lt;username&gt; &lt;password&gt;

# This program will validate a user's login against
# a salted, hashed password database.

# An example account-db is provided in ../data/accounts.db

# The format of an account database is:

# &lt;username&gt;:&lt;salt&gt;:&lt;salted-hashed-shasum-password&gt;

# Given a password PASS and a salt SALT, the command-line
# utility shasum can compute its salted hash:

# $ echo -n PASS:SALT | shasum

# For instance, the password "foobar" with salt "500" yields:

# $ echo -n foobar:500 | shasum 
# 8a8cafed972dff26d81e4b9542334a303f3821e2  -

# Thus, if user "matt" had the password "foobar", there would
# be this line in the accounts database:

# matt:500:8a8cafed972dff26d81e4b9542334a303f3821e2

# Salted, hashed passwords are a way of storing a password so
# that authentication is possible, but the password is unknown
# even to the server itself.

# If the login is valid, the script should print "valid" and
# exit with status 0.

# If the login is not valid, the script should print "invalid"
# and exit with status 1.

# You can assume that there will only be one entry for a given username.

# WARNING: In practice, you need to use something stronger than shasum these
# days, but some salting and hashing is better than none at all.


# Usage:
if [[ ! -n "$3" ]]
then
echo "usage `basename $0` <account-db> <username> <password>"
fi

# Get the username and some needed variables.
username="$2"
salt=$(cat "$1" | grep "$2" | awk -F ':' '{print $2}')
hash=$(cat "$1" | grep "$2" | awk -F ':' '{print $3}')
password="$3"

# Now check the shasum of the password they gave you and the salt you found. 
tempHash=$(printf "%s" "$password:$salt" | shasum | awk '{print $1}')

# If the hashes are the same, then it is valid, otherwise it isn't
if [[ "$tempHash" == "$hash" ]]
then
echo "valid"
exit 0
else
echo "invalid"
exit 1
fi


				</pre>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!-- /.container -->
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Daniel Houston 2013</p>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>
