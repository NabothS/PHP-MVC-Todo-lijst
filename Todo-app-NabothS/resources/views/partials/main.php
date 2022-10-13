<?php

use App\Http\Models\Todo;

$Todo = new Todo();

$todos = $Todo::getAllTodos();

//var_dump($todos);

?>


<div class="mainContainer">
            <main class="main">
                <h1 class="smallTitle">OMG, so much stuff to do!</h1>
                <div class="inputContainer">
                    <div>
                        <form class="inputInner" method="POST" action="create">
                            <input name='inputTask' type="text" placeholder="What to do next?" class="input">
                            <button class="add">+</button>
                        </form>
                    </div>
                </div>
                <div class="waitingContainer">
                        <?php for($i = 0; $i < count($todos); $i++) : ?>
                            <?php if($todos[$i]->is_complete == '0') : ?>
                            <form class="waitingInner" method="POST" action="edit" >
                                <div class="waitingLabelBox">
                                    <label class="waitingLabel"><?= $todos[$i]->name ?></label>
                                </div>
                                <button value='<?= $todos[$i]->id?>' name='todoid' class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/></svg></button>
                            </form>
                            <?php endif ?>
                        <?php endfor ?>
                </div>
                <h1 class="smallTitle">Ough, these 'r done!</h1>
                <div class="completeContainer">
                        <?php for($i = 0; $i < count($todos); $i++) : ?>
                            <?php if($todos[$i]->is_complete == '1') : ?>
                                <form class="completeInner" method="POST" action="delete">
                                    <div class="completeLabelBox">
                                        <label><?= $todos[$i]->title ?></label>
                                    </div>
                                    <button value='<?= $todos[$i]->id?>' name='todoid' class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg></button>
                                </form>
                            <?php endif ?>
                        <?php endfor ?>
                </div>
            </main>
        </div>