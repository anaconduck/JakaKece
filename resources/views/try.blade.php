@extends("layouts.app")

@section('slot')
<section class="section video" data-section="section5">
    <div class="container">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">{{ $data['title'] ?? '' }}</h2>
      <div class="row align-items-start">
        <div class="col-lg-4">
            <div class="left-content">
                <div class="col-md-12">
                    <div class="container">
                        <a href="{{ url('/inkubasi') }}">
                        <div class="back">
                            <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                            Kembali
                        </div>
                        </a>
                        <div class="list-group" id="list-tab" role="tablist">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
          <article class="content">
              <h4>Reading Comprehension</h4>
              <hr>
              <a href="#main_idea" class="badge badge-light">Main Idea</a>
              <a href="#factual" class="badge badge-light">Factual Information</a>
              <a href="#reference" class="badge badge-light">Reference</a>
              <a href="#vocab" class="badge badge-light">Vocabulary</a>
              <a href="#organization" class="badge badge-light">Organization of Ideas</a>
              <a href="#inference" class="badge badge-light">Inference</a>

              <h4 id="main_idea">Main Idea</h4>
              <hr>
              <p>
                Main idea questions are about the subject of the reading passage. It covers the main idea one or more than 2 paragraphs in the passage.
              </p>
              <p>
                  Typical main idea questions :
              </p>
              <ul>
                  <li><b>
                    What does the passage mainly discuss?
                  </b></li>
                  <li><b>
                    The main idea of the passage is...
                  </b></li>
                  <li><b>
                    The text mainly talkong about...
                  </b></li>
                  <li><b>
                    What is the main idea of the text?
                  </b></li>
              </ul>

              <h5>Tips</h5>
              <ul>
                  <li>
                    Read the first sentence of each paragraph.
                  </li>
                  <li>
                    Read the sentences carefully.
                  </li>
                  <li>
                    Find the main idea in the first sentence of each paragraph.
                  </li>
                  <li>
                    Eliminate questions that are clearly wrong answers and choose the most appropriate answer.
                  </li>
              </ul>
              <img src="http://127.0.0.1:8000/assets/images/reading_main.png" width="100%"/>
              <p>
                  What does the passage mainly discuss?
              </p>
              <ol>
                  <li>
                      The architecture of early American Indian buildings
                  </li>
                  <li>
                      The Movement of American Indians across North America
                  </li>
                  <li>
                      Ceremonies and rituals of American Indians
                  </li>
                  <li>
                      The way of life of American Indian tribes in early North America
                  </li>
              </ol>

              <h4 id="factual">Factual Information</h4>
              <hr>
              <p>
                Factual information questions are to find out the important information which is stated clearly in the passage.
                The questions are answering whether the information
                is true, not true, or not included in the passage.
              </p>
              <p>
                  Typical factual information questions :
              </p>
              <ul>
                  <li>All of the following are true EXCEPT ...
                </li>
                <li>
                    Which of the following is not stated ...
                </li>
                <li>
                    Which of the following is true ...
                </li>
              </ul>
              <h5>Tips</h5>
              <ul>
                  <li>
                    Check one by one the available answer choices and make sure whether the answer choices are in the paragraph or not.
                  </li>
                  <li>
                    Look carefully at the main object/word in the multiple choice and then you go straight to skimming where the sentence that contains the multiple choice is then read 1 sentence completely and you immediately know what the choice is.
                  </li>
              </ul>
              <img src="http://127.0.0.1:8000/assets/images/reading_main.png" width="100%"/>
              <p>
                Which of the following is true of the Shoshone and Ute?
            </p>
            <ol>
                <li>
                    They were not as settled as the Hopi and Zuni
                </li>
                <li>
                    They hunted caribou
                </li>
                <li>
                    They built their homes with adobe
                </li>
                <li>
                    They did not have many religious ceremonies
                </li>
            </ol>

            <h4 id="reference">Reference</h4>
            <hr>
            <p>
                This question are ask you to identify the relationship between the pronoun used with the previous phrase in the passage. You need to understand that the pronoun or abstract nouns (for example, “this idea” or “this characteristic”) is referred to
            </p>
            <p>
                Typical reference questions:
            </p>
            <ul>
                <li>
                    The word “it” in line ... refers to
                </li>
                <li>
                    The “characteristic” mentioned by the author in line ... most probably refers to
                </li>
            </ul>
            <h5>Tips</h5>
            <ul>
                <li>
                    Look the pronoun in the question whether singular or plural
                </li>
                <li>
                    Read the sentences before the pronoun
                </li>
                <li>
                    Determine whether the pronoun singular or plural
                </li>
                <li>
                    Read the sentence and match it with the pronoun being asked
                </li>
            </ul>
            <img src="http://127.0.0.1:8000/assets/images/reading_main.png" width="100%"/>
            <p>
                The word "they" in line 6 refers to
            </p>
            <ol>
                <li>goods</li>
                <li>buildings</li>
                <li>cliffs</li>
                <li>enemies</li>
            </ol>

            <h4 id="vocab">Vocabulary</h4>
            <hr>
            <p>
                Vocabulary questions focus on how the test taker understand about the meaning of the words and phrases in the passage. Besides, the meaning of a synonym is not always the literal meaning but also the correlation of the meaning with the context.
            </p>
            <p>
                Typical vocabulary questions:
            </p>
            <ul>
                <li>The word .... in line ... is closest in meaning to </li>
                <li>The word .... in line ... can be replaced by
                </li>
                <li>The word ... in line ... means that </li>
            </ul>
            <h5>Tips</h5>
            <ul>
                <li>Find the word/vocabulary mentioned in the question</li>
                <li>Read the sectences before and after the vocabulary</li>
                <li>Determine the meaning of the sentences</li>
                <li>Choose the answer that has the closest meaning</li>
            </ul>
            <img src="http://127.0.0.1:8000/assets/images/reading_main.png" width="100%"/>
            <p>
                The word "scarce" in line 10 is closes in meaning to
            </p>
            <ol>
                <li>limited</li>
                <li>hidden</li>
                <li>pure</li>
                <li>necessary</li>
            </ol>

            <h4 id="organization">Organization of Ideas</h4>
            <hr>
            <p>
                Organization and logic questions is to test the understanding about the structure of the passage. This type of question asks you to determine how the ideas of one paragraph relate to the ideas of other paragraphs.
            </p>
            <p>Typical organization and logic questions:
            </p>
            <ul>
                <li>
                    The paragraph following the passage discusses about
                </li>
                <li>
                    The paragraph preceding the passage discusses about
                </li>
                <li>
                    How is the information in the passage organized
                </li>
            </ul>
            <h5>Tips</h5>
            <ul>
                <li>Read the last line of the last paragraph (following)
                </li>
                <li>
                    Read the first line of the first paragraph (preceding)
                </li>
                <li>
                    Find words that show relationship between each paragraphs
                </li>
                <li>
                    Choose the aswer that best expresses the relationship
                </li>
            </ul>
            <img src="http://127.0.0.1:8000/assets/images/reading_2.png" width="100%"/>
            <p>
                The paragraph following the passage most likely discusses
            </p>
            <ol>
                <li>Additional uses of carbon tetrachloride</li>
                <li>the banning of various chemical compounds by the U.S. government</li>
                <li>further dangerous effects of carbon tetrachloride</li>
                <li>the major characteristic of carbon tetrachloride</li>
            </ol>

            <h4 id="inference">Inference</h4>
            <hr>
            <p>
                Inference questions are about concluding sentence of a paragraph. Based on the explicit information in the passage, this question asking you to draw a conslusion. It depends on what the passage is about. If it is a comparison, the inference question may ask the basic of the comparison.
            </p>
            <p>Typical Inference questions:</p>

            <ul>
                <li>It can be inferred from the passage that</li>
                <li>In the first paragraph, the author implies that</li>
                <li>Which of the following can be inferred from the second paragraph</li>
            </ul>
            <h5>Tips</h5>
            <ul>
                <li>Check one by one the available answer choices</li>
                <li>Find the sentences or paragraph mentioned which related to the questions</li>
                <li>Read sentences carefully</li>
                <li>Match with the available answers</li>
                <li>Choose the correct answer</li>
            </ul>
            <img src="http://127.0.0.1:8000/assets/images/reading_2.png" width="100%"/>
            <p>
                It can be inferred from the passage that one role of the U.S. government is to
            </p>
            <ol>
                <li>Regulate product safety</li>
                <li>prohibit any use of carbon tetrachloride</li>
                <li>Instruct industry on cleaning methologies</li>
                <li>ban the use of any chemicals</li>
            </ol>
          </article>
        </div>
      </div>
    </div>
  </section>
  <style>
        .back{
            margin-bottom: 20px;
            margin-left: 10px;
            background-color: rgba(240, 240, 240, 0.205);
            border-radius: 30px;
            padding-left: 10px;
            cursor: pointer;
            transition: all 0.5s;
        }
        .back img{
            transition: all 0.5s;
            margin-right: 10px;
            width: 35px;
        }
        .back:hover{
            font-size: 13pt;
        }
        .back:hover img{
            transform: translateX(-10px);
        }
        .content{
            font-size: 11pt;
        }
        .content p{
            font-size: 11pt;
            display: inline-block;
            margin: 10px 0;
        }
        .content ul li{
            list-style-type:square;
            margin: 0 20px;
        }
        .content h4{
            margin-top: 80px;
        }
        .content h4:first-child{
            margin-top: 0;
        }
        hr{
            color: white;
            border: 1px solid white;
        }
        .content h5{
            margin-top: 40px;
        }
        .content ol{
            list-style-type:upper-alpha;
        }
        .content img{
            margin:30px 0;
        }
  </style>
@stop

@section('script')
  <script>
      let container = $('#inpcontainer'); //container dari semua inputan
    let tambah = $('#tambah'); //tombol tambah inputan
    let index = 2; //increment name input
    function tambahInput(type, name) {
      return name + "<input class='m-2 p-1' type='" + type + "' name='" + name + index + "'/><br>";
    } //fungsi untuk nambah input, tinggal modifikasi sesuai style sama kebutuhan

    tambah.click(function() {
      container.append(tambahInput('text', 'Name'))
      container.append(tambahInput('text', 'Nim'))
      index++;
    }) //nambahin listener ke tombol tambah
  </script>
@stop
