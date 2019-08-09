package sample.Controller;

import javafx.application.Platform;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;

public class newFxmlController {

    @FXML
    private AnchorPane newFxmlAnchorPane;
    @FXML
    private Button btnBackFxml;

    @FXML
    private Button free;

    @FXML
    public void initialize() {
        System.gc();
//        ChildThread ct = new ChildThread();
//        ct.start();

        btnBackFxml.setOnMouseClicked(new EventHandler<MouseEvent>() {
            @Override
            public void handle(MouseEvent event) {
                try{
                    Stage stage = (Stage) newFxmlAnchorPane.getScene().getWindow();
                    Parent root = FXMLLoader.load(getClass().getResource("/sample/layout/sample.fxml"));
                    stage.setTitle("Hello World");
                    stage.setScene(new Scene(root));
                    stage.show();
                }catch(Exception e){

                }

            }
        });

        free.setOnMouseClicked(new EventHandler<MouseEvent>() {
            @Override
            public void handle(MouseEvent event) {
                System.gc();

            }
        });


    }

//    class ChildThread extends Thread
//    {
//        @Override
//        public void run()
//        {
//            for(int i=0; i<1;){
//                System.gc();
//                System.out.println("Hello: ");
//            }
//
//        }
//    }

}
