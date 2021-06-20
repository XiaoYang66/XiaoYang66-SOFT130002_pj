function get_user(){
    let user=localStorage.getItem('user');
    if (user===null){
        return ''
    }
    else {
        return user;
    }
}