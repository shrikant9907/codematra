handleModalToggle = () => {
  const { showModal } = this.state;
  this.setState({ 
    showModal: !showModal;
  });
}