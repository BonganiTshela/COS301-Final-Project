rm benchmarking/json/*
rm benchmarking/testFiles/*
cp -rf benchmarking/original/* benchmarking
cp uploaded/*.txt benchmarking/testFiles
ALGOS="$(java Primer)"
javac benchmarking/*.java
cd benchmarking
java Main "$ALGOS"
