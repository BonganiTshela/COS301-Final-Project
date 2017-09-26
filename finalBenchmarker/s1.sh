cp uploaded/*.txt benchmarking/testFiles
ALGOS="$(java Primer)"
echo "$ALGOS"
javac benchmarking/*.java
cd benchmarking
java Main "$ALGOS"
