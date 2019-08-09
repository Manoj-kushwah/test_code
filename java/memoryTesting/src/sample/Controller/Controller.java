package sample.Controller;

import javafx.application.Platform;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ListCell;
import javafx.scene.control.ListView;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;
import javafx.util.Callback;
import sample.cellFactory.newCellFactory;

import java.awt.*;
import java.io.IOException;

public class Controller {

    @FXML
    private Button one;

    @FXML
    private Button two;

    @FXML
    private Button three;


    @FXML
    private AnchorPane listAnchorPane;

    @FXML
    private AnchorPane mainAnchorPane;

    @FXML
    private AnchorPane demoFxmlAnchorPane;

    @FXML
    private AnchorPane imgAnchorPane;

    @FXML
    private ListView listView;

    @FXML
    private ImageView img1;



    public Stage stage;
    private Pane newPane;

    @FXML
    public void initialize() {




        one.setOnMouseClicked(new EventHandler<MouseEvent>() {
            @Override
            public void handle(MouseEvent event) {
                try{
                    listAnchorPane.setVisible(true);

                }catch(Exception e){
                    e.printStackTrace();
                }

            }
        });




        two.setOnMouseClicked(new EventHandler<MouseEvent>() {
            @Override
            public void handle(MouseEvent event) {
                System.gc();
                System.out.printf("Spheres added. Total number of spheres: %d. Used memory: %d Bytes of %d Bytes.\n",
                        mainAnchorPane.getChildren().size(),
                        Runtime.getRuntime().totalMemory() - Runtime.getRuntime().freeMemory(),
                        Runtime.getRuntime().maxMemory());
                if(demoFxmlAnchorPane.isVisible()){
                    demoFxmlAnchorPane.getChildren().remove(demoFxmlAnchorPane);
                    if(img1!=null)
                    img1.setVisible(false);


                    demoFxmlAnchorPane.setVisible(false);
                }else{
                    try {

                        imgAnchorPane.setVisible(true);
                        demoFxmlAnchorPane.setVisible(true);
                        newPane = FXMLLoader.load(getClass().getResource("/sample/layout/one.fxml"));
                        demoFxmlAnchorPane.getChildren().add(newPane);
                        AnchorPane.setLeftAnchor(newPane, 0.0);
                        AnchorPane.setRightAnchor(newPane, 0.0);
                        AnchorPane.setTopAnchor(newPane, 0.0);
                        AnchorPane.setBottomAnchor(newPane, 0.0);
                        img1 = null;
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                }

            }
        });

        three.setOnMouseClicked(new EventHandler<MouseEvent>() {
            @Override
            public void handle(MouseEvent event) {
                try {
                    stage = (Stage) mainAnchorPane.getScene().getWindow();
                    System.gc();
                    Parent root = FXMLLoader.load(getClass().getResource("/sample/layout/newFxml.fxml"));
                    Stage s = new Stage();
                    s.setTitle("Hello World");
                    s.setScene(new Scene(root));
                    s.show();
//                    freeMemory();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        });



    }

      private void freeMemory(){
          img1 = null;
//
          mainAnchorPane.getChildren().removeAll();
          mainAnchorPane = null;
          one = null;
          two = null;
          three = null;
          demoFxmlAnchorPane.getChildren().removeAll();
          demoFxmlAnchorPane = null;
          stage.close();
          stage = null;
          System.gc();
      }

}
