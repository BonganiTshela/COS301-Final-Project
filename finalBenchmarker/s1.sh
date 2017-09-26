cp uploaded/*.txt benchmarking/testFiles
ALGOS="$(java Primer)"
javac benchmarking/*.java
java -cp benchmarking Main $OUTPUT
