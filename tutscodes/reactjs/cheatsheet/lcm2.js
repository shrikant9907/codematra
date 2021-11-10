shouldComponentUpdate(nextProps, nextState) // Invoked before new updates
render() // Rendering the component in DOM
getSnapshotBeforeUpdate(nextProps, nextState) // Before update to capture some information.
componentDidUpdate(prevProps, prevState, snapshot) // Inovked after updating