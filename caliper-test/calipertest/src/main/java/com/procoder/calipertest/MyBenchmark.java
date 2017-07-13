/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.procoder.calipertest;
import com.google.caliper.SimpleBenchmark;

/**
 *
 * @author Minal
*/ 
public class MyBenchmark extends SimpleBenchmark {
    private int type;
    
    public MyBenchmark() {
        type = 0;
    }
    
    public MyBenchmark(int t) {
        type = t;
    }
    
    public void timeMyOperation(int reps) {
        for (int k = 0; k < reps; k++)
            switch (type) {
                case 1 : Factorial.iterative(10);
                case 2 : Factorial.iterativeObjects(10);
                default: Factorial.recursive(10);
            }
    }
}

/*
public class MyBenchmark implements Runnable {
    private Thread t;
    private String threadName;
    private int iterations;
    private boolean recursive = false;
    private boolean iterative = false;
    private boolean objects = false;
    
    MyBenchmark(String name, int n, String method) {
        threadName = name;
        iterations = n;
        if (method.equals("recursive")) recursive = true;
        if (method.equals("iterative")) iterative = true;
        if (method.equals("objects")) objects = true;
    }
    
    public void run() {
        if (recursive)
            Factorial.recursive(iterations);
        else if (iterative)
            Factorial.iterative(iterations);
        else
            Factorial.iterativeObjects(iterations);
    }
    
    public void start() {
        if (t == null) {
            t = new Thread(this, threadName);
            t.start();
        }
    }
}
