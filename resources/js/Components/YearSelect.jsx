import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

export default function YearSelect({
    value,
    onChange,
    startYear = 2020,
    endYear = new Date().getFullYear(),
    placeholder = "Pilih tahun",
}) {
    const years = [];

    for (let y = endYear; y >= startYear; y--) {
        years.push(y.toString());
    }

    return (
        <Select value={value} onValueChange={onChange}>
            <SelectTrigger>
                <SelectValue placeholder={placeholder} />
            </SelectTrigger>

            <SelectContent>
                {years.map((year) => (
                    <SelectItem key={year} value={year}>
                        {year}
                    </SelectItem>
                ))}
            </SelectContent>
        </Select>
    );
}
