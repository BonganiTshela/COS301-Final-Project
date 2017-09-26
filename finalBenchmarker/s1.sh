cp uploaded/*.txt benchmarking/testFiles
ALGOS="$(java Primer)"
javac benchmarking/*.java
cd benchmarking
java Main "$ALGOS"
