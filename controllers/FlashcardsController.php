class FlashcardsController extends AppController {

	public $helpers = array('Form');
	public $components = array('Session');

	public function index() {
		$this->set('flashcards', $this->Flashcards->find('all');
		}
	
	public function view($user_Name = null) {
		if (!$user_Name) {
			throw new NotFoundException(_('Invalid flashcard'));
		}

		$flashcards = $this->Flashcards->findbyUserName($user_Name);
		if (!$flashcards) {
			throw new NotFoundException(_('Invalid flashcard'));
		}
		$this->set('flashcards', $flashcards);

	public function add() {
		if ($this->request->is('flashcard')) {
		    $this->Flashcards->create();

}