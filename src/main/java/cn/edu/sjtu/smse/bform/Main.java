package cn.edu.sjtu.smse.bform;

import cn.edu.sjtu.smse.bform.cli.BformCliApplication;
import cn.edu.sjtu.smse.bform.web.BformWebApplication;
import org.springframework.boot.SpringApplication;

/**
 * Created by at15 on 16-4-16.
 */
public class Main {
    public static void main(String[] args) {
        if (args.length == 0) {
            SpringApplication.run(BformCliApplication.class, args);
        } else {
            SpringApplication.run(BformWebApplication.class, args);
        }
    }
}
