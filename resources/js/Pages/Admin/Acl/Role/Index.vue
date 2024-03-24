<template>
    <LayoutAuthenticated>
        <Head title="Roles"/>
        <SectionMain>
            <CardBox title="Roles" has-table>
                <template #header-tools>
                    <Button
                        icon="mdiPlus"
                        title="Add Role"
                        type="primary"
                        plain
                    />
                </template>

                <DataTable
                    :data="tableData"
                    :columns="columns"
                />

                <template #footer>
                    <div class="text-right">
                        <el-pagination
                            background
                            layout="prev, pager, next"
                            :total="100"
                        />
                    </div>
                </template>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import Button from "@/Components/Button.vue";
import CardBox from "@/Components/CardBox.vue";
import TableComp from "@/Components/TableComp.vue";
import DataTable from "@/Components/DataTbale.vue";

const tableData = [
    {
        date: '2016-05-03',
        name: 'Tom',
        state: 'California',
        city: 'Los Angeles',
        address: 'No. 189, Grove St, Los Angeles',
        zip: 'CA 90036',
        tag: 'Home',
    },
    {
        date: '2016-05-02',
        name: 'Tom',
        state: 'California',
        city: 'Los Angeles',
        address: 'No. 189, Grove St, Los Angeles',
        zip: 'CA 90036',
        tag: 'Office',
    },
    {
        date: '2016-05-04',
        name: 'Tom',
        state: 'California',
        city: 'Los Angeles',
        address: 'No. 189, Grove St, Los Angeles',
        zip: 'CA 90036',
        tag: 'Home',
    },
    {
        date: '2016-05-01',
        name: 'Tom',
        state: 'California',
        city: 'Los Angeles',
        address: 'No. 189, Grove St, Los Angeles',
        zip: 'CA 90036',
        tag: 'Office',
    },
];

const columns = [
    {
        prop: 'date',
        label: 'Date',
        width: '180',
    },
    {
        prop: 'name',
        label: 'Name',
    },
    {
        prop: 'state',
        label: 'State',
    },
    {
        prop: 'city',
        label: 'City',
    },
    {
        prop: 'address',
        label: 'Address',
        width: '300',
    },
];

const handleClick = () => {
    console.log('clicked');
};
</script>

<style scoped lang="scss">

</style>