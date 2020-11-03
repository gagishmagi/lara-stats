import React from "react";
import ReactDom from "react-dom";

class Dashboard extends React.Component {

    constructor(props){
        super(props);

        this.state = {
            ip : 'no ip',
            clicks : 0
        };
    }

    componentDidMount(){
        this.getStats();
    }

    async getStats(){
        let stat = await axios.get('/api/statistics', {
            body: {}
        })
        this.setState(stat.data);
        // document.getElementsByClassName('card-body').innerHtml = '';
    }

    render(){
        const { ip, clicks } = this.state;

        return (
            <div className="container mt-5">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card text-center">
                            <div className="card-header"><h2>Dashboard</h2></div>
                            <div className="card-body">The Site was clicked by ip { ip }  { clicks } times</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Dashboard;
// DOM element
if (document.getElementById('dashboard')) {
    ReactDom.render( <Dashboard/> , document.getElementById('dashboard'));
}
